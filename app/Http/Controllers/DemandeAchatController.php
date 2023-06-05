<?php

namespace App\Http\Controllers;

use App\Models\DemandeAchat;
use App\Models\VirtuelArticle;
use App\Models\VirtuelLigneAchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DemandeAchatController extends Controller
{
    // Show all demandeachats
    public function index()
    {

        $demandeachats = DemandeAchat::latest()->filter(request(['date', 'etat']));

        

        // // generate the pdf as base64 string for each demandeachat
        // foreach ($demandeachats->get() as $demandeachat) {
        //     $pdfBase64Array[$demandeachat->id] = $this->pdfBase64($demandeachat);
        // }

        // make an array of each etat and the number of demandeachats with this etat
        $etatArray = [];
        foreach (DemandeAchat::all() as $demandeachat) {
            $etatArray[$demandeachat->etat] = $demandeachat->where('etat', $demandeachat->etat)->count();
        }
        
        

        // return $pdfBase64Array and demandeachats to the view
        return view('demandeachats.index', [
            'demandeachats' => $demandeachats->paginate(5),
            'pdfBase64Array' => $pdfBase64Array ?? [],
            'filters' => [
                'date' => request('date'),
                'etat' => request('etat'),
            ],
            'etatArray' => $etatArray,
        ]);
    }

    // Show a single demandeachat
    public function show(DemandeAchat $demandeachat)
    {
        return view('demandeachats.show', [
            'demandeachat' => $demandeachat,
        ]);
    }

    // Show the edit form
    public function edit(DemandeAchat $demandeachat)
    {
        return view('demandeachats.edit', [
            'demandeachat' => $demandeachat,
        ]);
    }

    // Update the demandeachat
    public function update(Request $request, DemandeAchat $demandeachat) {
        //dd($request->all() );

        $formFields = $request->validate([
            'date' => 'required',
            'etat' => 'required',
            'remarque' => 'nullable',
            'virtuelarticles.*.titre' => 'required',
            'virtuelarticles.*.description' => 'required',
            'virtuelarticles.*.quantite' => ['required','numeric','min:0'],
        ]);


        try {
            // begin the transaction
            DB::beginTransaction();
            
            // update the demandeachat
            $demandeachat->update([
                'date' => $formFields['date'],
                'etat' => $formFields['etat'],
                'remarque' => $formFields['remarque'] ?? null,
            ]);

            // delete the virtuelarticles that aren't in the form 
            $demandeachat->virtuelLigneAchats()->whereNotIn('virtuel_article_id', array_column($formFields['virtuelarticles'], 'id'))->delete();

            // update or create the virtuelarticles
            foreach ($formFields['virtuelarticles'] as $virtuelarticle) {
                $quantite = $virtuelarticle['quantite'];
                unset($virtuelarticle['quantite']);
                
                // Create or update the VirtuelArticle
                $virtuelarticleModel = VirtuelArticle::updateOrCreate($virtuelarticle);
                
                // Create or update the association with VirtuelLigneAchat
                VirtuelLigneAchat::updateOrCreate([
                    'virtuel_article_id' => $virtuelarticleModel->id,
                    'demande_achat_id' => $demandeachat->id,
                ], [
                    'quantite' => $quantite,
                ]);
            }

            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }


        return back()->with('message', 'DemandeAchat updated successfully!');
    }

    // Delete the demandeachat
    public function destroy(DemandeAchat $demandeachat) {
        $demandeachat->is_active = false;
        $demandeachat->save();
        return back()->with('message', 'DemandeAchat deleted successfully!');
    }

    // Show the create form
    public function create() {
        return view('demandeachats.create');
    }

    // Store the demandeachat
    public function store(Request $request) {

        //dd($request->all() );

        $formFields = $request->validate([
            'date' => 'required',
            'etat' => 'required',
            'remarque' => 'nullable',
            'virtuelarticles.*.titre' => 'required',
            'virtuelarticles.*.description' => 'required',
            'virtuelarticles.*.code' => 'nullable',
            'virtuelarticles.*.quantite' => ['required','numeric','min:0'],
        ]);
        
        try {

            // begin the transaction
            DB::beginTransaction();
            
            // create the demandeachat
            $demandeachat = DemandeAchat::create([
                'date' => $formFields['date'],
                'etat' => $formFields['etat'],
                'remarque' => $formFields['remarque'] ?? null,
            ]);

            // save the virtuelarticles
            foreach ($formFields['virtuelarticles'] as $virtuelarticle) {
                $quantite = $virtuelarticle['quantite'];
                unset($virtuelarticle['quantite']);
                
                // Create or update the VirtuelArticle
                $virtuelarticleModel = VirtuelArticle::updateOrCreate($virtuelarticle);
                
                // Create or update the association with VirtuelLigneAchat
                VirtuelLigneAchat::updateOrCreate([
                    'virtuel_article_id' => $virtuelarticleModel->id,
                    'demande_achat_id' => $demandeachat->id,
                ], [
                    'quantite' => $quantite,
                ]);
            }
            
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }

        return redirect('/demandeachats')->with('message', 'DemandeAchat created successfully!');
    }

    // Generate PDF
    public function pdf(DemandeAchat $demandeachat) {
        $data = [
            'demandeachat' => $demandeachat,
            'amount' => 100.00,
        ];
    
        $pdf = PDF::loadView('pdf.demandeachat', $data);
    
        return $pdf->stream('demandeachat.pdf');
    }

    // Generate PDF as base64 string
    public function pdfBase64(DemandeAchat $demandeachat) {
        $data = [
            'demandeachat' => $demandeachat,
            'amount' => 100.00,
        ];
    
        $pdf = PDF::loadView('pdf.demandeachat', $data);
    
        return base64_encode($pdf->output());
    }
}

