<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    // Show all articles
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->filter(request(['search']))->paginate(5),
        ]);
    }

    // Show a single article
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    // Show the edit form
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    // Update the article
    public function update(Request $request, Article $article) {
        //dd($request->all() );

        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'code' => ['required'],
            'prix_achat' => ['required','numeric','min:0'],
            'prix_vente' => ['numeric','min:0'],
            'quantite' => ['required','numeric','min:0'],
        ]);


        try {
            // begin the transaction
            DB::beginTransaction();
            $article->update($formFields);
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }


        return back()->with('message', 'Article updated successfully!');
    }

    // Delete the article
    public function destroy(Article $article) {
        $article->article->is_active = false;
        $article->article->save();
        return back()->with('message', 'Article deleted successfully!');
    }

    // Show the create form
    public function create() {
        return view('articles.create');
    }

    // Store the article
    public function store(Request $request) {

        //dd($request->all() );

        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'code' => ['required'],
            'prix_achat' => ['required','numeric','min:0'],
            'prix_vente' => ['numeric','min:0'],
            'quantite' => ['required','numeric','min:0'],
        ]);
        
        try {

            // begin the transaction
            DB::beginTransaction();
            Article::create($formFields);
            
            // commit the transaction
            DB::commit();
        } catch (\Throwable $e) {
            // handle the error here, for example:
            dd($e->getMessage());
            // rollback the transaction
            DB::rollback();
        }

        return redirect('/articles')->with('message', 'Article created successfully!');
    }
}
