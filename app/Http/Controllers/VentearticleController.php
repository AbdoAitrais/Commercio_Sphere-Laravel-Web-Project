<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\VenteArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentearticleController extends Controller
{
    // Show all ventearticles
    public function index()
    {
        return view('ventearticles.index', [
            'ventearticles' => VenteArticle::latest()->filter(request(['search']))->paginate(5),
        ]);
    }

    // Show a single ventearticle
    public function show(VenteArticle $ventearticle)
    {
        return view('ventearticles.show', [
            'ventearticle' => $ventearticle,
        ]);
    }

    // Show the edit form
    public function edit(VenteArticle $ventearticle)
    {
        return view('ventearticles.edit', [
            'ventearticle' => $ventearticle,
        ]);
    }

    // Update the ventearticle
    public function update(Request $request, VenteArticle $ventearticle) {
        //dd($request->all() );

        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'code' => ['required'],
            'prix' => ['required'],
        ]);


        try {
            // begin the transaction
            DB::beginTransaction();
            $article = $ventearticle->article;
            $article->update($formFields);
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }


        return back()->with('message', 'VenteArticle updated successfully!');
    }

    // Delete the ventearticle
    public function destroy(VenteArticle $ventearticle) {
        $ventearticle->article->is_active = false;
        $ventearticle->article->save();
        return back()->with('message', 'VenteArticle deleted successfully!');
    }

    // Show the create form
    public function create() {
        return view('ventearticles.create');
    }

    // Store the ventearticle
    public function store(Request $request) {

        //dd($request->all() );

        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'code' => ['required'],
            'prix' => ['required'],
        ]);
        
        try {

            // begin the transaction
            DB::beginTransaction();
            $article = Article::create($formFields);
            $ventearticle = new VenteArticle();
            $ventearticle->article()->associate($article);
            $ventearticle->save();
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }

        return redirect('/ventearticles')->with('message', 'VenteArticle created successfully!');
    }
}
