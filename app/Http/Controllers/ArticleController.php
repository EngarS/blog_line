<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'articles' => Article::where('created_by', Auth::id())->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create',[
            'article' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Article::create($request->all());
       // /*
        $article = new Article;

        $article->title = $request->title;
        $article->description_short = $request->description_short;
        $article->description = $request->description;
        $article->published = $request->published;
        $article->viewed = 0;
        $article->created_by = $request->created_by;

        $article->save();
        //*/

        return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */ //Article $article
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',[
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */ //Article $article
    public function update(Request $request, int $id)
    {
        $article = Article::find($id);
        //$article->update($request->all());
        $article->title = $request->input('title');
        $article->description_short = $request->input('description_short');
        $article->description = $request->input('description');
        $article->published = $request->input('published');
        $article->viewed = 0;

        $article->save();


        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\ResponseArticle
     */ //Article  $article
    public function destroy($id)
    {
        Article::find($id)->delete();
        //$article->delete();
        return redirect()->route('home.index');
        //return $article->description;
    }


    // show all
    public function show_all()
    {
        return view('index', [
            'articles' => Article::where('published', '1')->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
}
