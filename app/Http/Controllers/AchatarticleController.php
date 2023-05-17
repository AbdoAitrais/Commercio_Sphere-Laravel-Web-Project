<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AchatArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatarticleController extends Controller
{
    // Show all achatarticles
    public function index()
    {
        return view('achatarticles.index', [
            'achatarticles' => AchatArticle::latest()->filter(request(['search']))->paginate(5),
        ]);
    }

    // Show a single achatarticle
    public function show(AchatArticle $achatarticle)
    {
        return view('achatarticles.show', [
            'achatarticle' => $achatarticle,
        ]);
    }

    // Show the edit form
    public function edit(AchatArticle $achatarticle)
    {
        return view('achatarticles.edit', [
            'achatarticle' => $achatarticle,
        ]);
    }

    // Update the achatarticle
    public function update(Request $request, AchatArticle $achatarticle) {
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
            $article = $achatarticle->article;
            $article->update($formFields);
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }


        return back()->with('message', 'AchatArticle updated successfully!');
    }

    // Delete the achatarticle
    public function destroy(AchatArticle $achatarticle) {
        $achatarticle->article->is_active = false;
        $achatarticle->article->save();
        return back()->with('message', 'AchatArticle deleted successfully!');
    }

    // Show the create form
    public function create() {
        return view('achatarticles.create');
    }

    // Store the achatarticle
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
            $achatarticle = new AchatArticle;
            $achatarticle->article()->associate($article);
            $achatarticle->save();
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }

        return redirect('/achatarticles')->with('message', 'AchatArticle created successfully!');
    }
}
