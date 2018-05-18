<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ArticleController extends Controller
{

    public function index()
    {
        return view('home', [
            'articles' => Article::where('created_by', Auth::id())->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function create()
    {
        return view('articles.create',[
            'article' => []
        ]);
    }

    public function store(Request $request)
    {
        $article = new Article;

        $article->title = $request->title;
        $article->description_short = $request->description_short;
        $article->description = $request->description;
        $article->published = $request->published;
        $article->viewed = 0;
        $article->created_by = $request->created_by;

        $article->save();

        return redirect()->route('/');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',[
            'article' => $article
        ]);
    }

    public function update(Request $request, int $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description_short = $request->input('description_short');
        $article->description = $request->input('description');
        $article->published = $request->input('published');
        $article->viewed = 0;

        $article->save();


        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
        Article::find($id)->delete();

        return redirect()->route('home.index');
    }

    // show all
    public function show_all()
    {
        return view('index', [
            'articles' => Article::where('published', '1')->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
}
