<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Devis;
use App\Models\LigneDevis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevisController extends Controller
{
    // Show all devis
    public function index()
    {

        $devis = Devis::latest()->filter(request(['date', 'etat']));

        

        // // generate the pdf as base64 string for each devis
        // foreach ($devis->get() as $devis) {
        //     $pdfBase64Array[$devis->id] = $this->pdfBase64($devis);
        // }

        // make an array of each etat and the number of devis with this etat
        $etatArray = [];
        foreach (Devis::all() as $devis) {
            $etatArray[$devis->etat] = $devis->where('etat', $devis->etat)->count();
        }
        
        

        // return $pdfBase64Array and devis to the view
        return view('devis.index', [
            'devis' => $devis->paginate(5),
            'pdfBase64Array' => $pdfBase64Array ?? [],
            'filters' => [
                'date' => request('date'),
                'etat' => request('etat'),
            ],
            'etatArray' => $etatArray,
        ]);
    }

    // Show a single devis
    public function show(Devis $devis)
    {
        return view('devis.show', [
            'devis' => $devis,
        ]);
    }

    // Show the edit form
    public function edit(Devis $devis)
    {
        return view('devis.edit', [
            'devis' => $devis,
        ]);
    }

    // Update the devis
    public function update(Request $request, Devis $devis) {
        //dd($request->all() );

        $formFields = $request->validate([
            'date' => 'required',
            'remarque' => 'nullable',
            'numero' => 'required|unique:demande_achats',
            'articles.*.titre' => 'required',
            'articles.*.description' => 'required',
            'articles.*.code' => 'nullable',
            'articles.*.quantite' => ['required','numeric','min:0'],
            'articles.*.prix_achat' => ['required','numeric','min:0'],
            'articles.*.prix_vente' => ['required','numeric','min:0'],

        ]);


        try {
            // begin the transaction
            DB::beginTransaction();
            
            // update the devis
            $devis->update([
                'date' => $formFields['date'],
                'etat' => $formFields['etat'],
                'remarque' => $formFields['remarque'] ?? null,
            ]);

            // delete the articles that aren't in the form 
            $devis->virtuelLigneAchats()->whereNotIn('article_id', array_column($formFields['articles'], 'id'))->delete();

            // update or create the articles
            foreach ($formFields['articles'] as $article) {
                $quantite = $article['quantite'];
                unset($article['quantite']);
                
                // Create or update the Article
                $articleModel = Article::updateOrCreate($article);
                
                // Create or update the association with LigneDevis
                LigneDevis::updateOrCreate([
                    'article_id' => $articleModel->id,
                    'devis_id' => $devis->id,
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


        return back()->with('message', 'Devis updated successfully!');
    }

    // Delete the devis
    public function destroy(Devis $devis) {
        $devis->is_active = false;
        $devis->save();
        return back()->with('message', 'Devis deleted successfully!');
    }

    // Show the create form
    public function create() {
        // generate numero
        $devis = new Devis();

        return view('devis.create', [
            'numero' => $devis ? $devis->generateNumero() : ('DEV-'.date('Y').'-0000') + Devis::count(),
        ]);
    }

    // Store the devis
    public function store(Request $request) {

        //dd($request->all() );

        $formFields = $request->validate([
            'date' => 'required',
            'remarque' => 'nullable',
            'articles.*.titre' => 'required',
            'articles.*.description' => 'required',
            'articles.*.code' => 'nullable',
            'articles.*.quantite' => ['required','numeric','min:0'],
            'articles.*.prix_achat' => ['required','numeric','min:0'],
            'articles.*.prix_vente' => ['required','numeric','min:0'],

        ]);
        
        try {

            // begin the transaction
            DB::beginTransaction();
            
            // set default etat
            $formFields['etat'] = 'En cours';

            // create the devis
            $devis = Devis::create([
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
                
                // Create or update the association with LigneDevis
                LigneDevis::updateOrCreate([
                    'article_id' => $articleModel->id,
                    'devis_id' => $devis->id,
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

        return redirect('/devis')->with('message', 'Devis created successfully!');
    }

    // Generate PDF
    public function pdf(Devis $devis) {
        $data = [
            'devis' => $devis,
            'amount' => 100.00,
        ];
    
        $pdf = PDF::loadView('pdf.devis', $data);
    
        return $pdf->stream('devis.pdf');
    }

    // Generate PDF as base64 string
    public function pdfBase64(Devis $devis) {
        $data = [
            'devis' => $devis,
            'amount' => 100.00,
        ];
    
        $pdf = PDF::loadView('pdf.devis', $data);
    
        return base64_encode($pdf->output());
    }
}
