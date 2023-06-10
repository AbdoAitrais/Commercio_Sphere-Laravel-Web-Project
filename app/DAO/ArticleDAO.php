<?

namespace App\DAO;

use App\Models\Article;


class ArticleDAO
{
    public function getArticles(String $filter = null)
    {
        return Article::latest()->filter($filter)->paginate(5);
    }

    public function getArticle($id)
    {
        return Article::find($id);
    }

    public function createArticle($request)
    {
        $article = new Article();
        $article->code = $request->code;
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->save();
    }

    public function updateArticle($request, $id)
    {
        $article = Article::find($id);
        $article->code = $request->code;
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->save();
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->delete();
    }
} 