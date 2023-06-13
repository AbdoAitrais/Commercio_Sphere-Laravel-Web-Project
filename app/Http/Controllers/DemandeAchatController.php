<?php

namespace App\Http\Controllers;

use App\Models\DemandeAchat;
use App\Models\Article;
use App\Models\VirtuelLigneAchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DemandeAchatController extends Controller
{
    // Show all demandeachats
    public function index()
    {

        $demandeachats = DemandeAchat::latest()->filter(request(['date', 'etat']))->paginate(5);

        

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
            'demandeachats' => $demandeachats,
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
            'articles.*.titre' => 'required',
            'articles.*.description' => 'required',
            'articles.*.quantite' => ['required','numeric','min:0'],
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

            // delete the articles that aren't in the form 
            $demandeachat->virtuelLigneAchats()->whereNotIn('article_id', array_column($formFields['articles'], 'id'))->delete();

            // update or create the articles
            foreach ($formFields['articles'] as $article) {
                $quantite = $article['quantite'];
                unset($article['quantite']);
                
                // Create or update the Article
                $articleModel = Article::updateOrCreate($article);
                
                // Create or update the association with VirtuelLigneAchat
                VirtuelLigneAchat::updateOrCreate([
                    'article_id' => $articleModel->id,
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
        // generate numero
        $demandeachat = new DemandeAchat();

        return view('demandeachats.create', [
            'numero' => $demandeachat ? $demandeachat->generateNumero() : ('DA-'.date('Y').'-0000') + DemandeAchat::count(),
        ]);
    }

    // Store the demandeachat
    public function store(Request $request) {

        //dd($request->all() );

        $formFields = $request->validate([
            'date' => 'required',
            'remarque' => 'nullable',
            'numero' => 'required|unique:demande_achats',
            'articles.*.titre' => 'required',
            'articles.*.description' => 'required',
            'articles.*.code' => 'nullable',
            'articles.*.quantite' => ['required','numeric','min:0'],
        ]);
        
        try {

            // begin the transaction
            DB::beginTransaction();
            
            // set default etat
            $formFields['etat'] = 'En cours';

            // create the demandeachat
            $demandeachat = DemandeAchat::create([
                'date' => $formFields['date'],
                'etat' => $formFields['etat'],
                'numero' => $formFields['numero'],
                'remarque' => $formFields['remarque'] ?? null,
            ]);

            // save the articles
            foreach ($formFields['articles'] as $article) {
                $quantite = $article['quantite'];
                unset($article['quantite']);
                
                // Create or update the Article
                $articleModel = Article::updateOrCreate($article);
                
                // Create or update the association with VirtuelLigneAchat
                VirtuelLigneAchat::updateOrCreate([
                    'article_id' => $articleModel->id,
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

