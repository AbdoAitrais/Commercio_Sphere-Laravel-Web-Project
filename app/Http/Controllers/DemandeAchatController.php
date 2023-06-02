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
        return view('demandeachats.index', [
            'demandeachats' => DemandeAchat::latest()->filter(request(['search']))->paginate(5),
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
            ]);

            // update or create the virtuelarticles
            foreach ($formFields['virtuelarticles'] as $virtuelarticle) {
                $virtuelarticle = new VirtuelArticle($virtuelarticle);
                $virtuelligneachats = VirtuelLigneAchat::updateOrCreate([
                    'quantite' => $virtuelarticle->quantite,
                ]);
                $virtuelligneachats->virtuelarticle()->associate($virtuelarticle);
                $virtuelligneachats->demandeachat()->associate($demandeachat);
                $virtuelligneachats->save();
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
            'virtuelarticles.*.quantite' => ['required','numeric','min:0'],
        ]);
        
        try {

            // begin the transaction
            DB::beginTransaction();
            
            // create the demandeachat
            $demandeachat = DemandeAchat::create([
                'date' => $formFields['date'],
                'etat' => $formFields['etat'],
            ]);

            // save the virtuelarticles
            foreach ($formFields['virtuelarticles'] as $virtuelarticle) {
                $quantite = $virtuelarticle['quantite'];
                unset($virtuelarticle['quantite']);
                $virtuelarticle = VirtuelArticle::create($virtuelarticle);
                $virtuelligneachats = new VirtuelLigneAchat();
                $virtuelligneachats->virtuelarticle()->associate($virtuelarticle);
                $virtuelligneachats->demandeachat()->associate($demandeachat);
                $virtuelligneachats->quantite = $quantite;
                $virtuelligneachats->save();
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
    public function generatePDF(DemandeAchat $demandeachat) {
        $data = [
            'invoice_number' => 'INV-123',
            'amount' => 100.00,
        ];
    
        $pdf = PDF::loadView('pdf.demandeachat', $data);
    
        return $pdf->stream('demandeachat.pdf')->save(public_path("storage/documents/fichier.pdf"));
    }
}

