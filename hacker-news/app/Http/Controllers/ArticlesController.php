<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller
{
    // -------------- articles --------------
    public function show() {
        $articles = Article::latest()->get();
        return view('pages.articles.show', compact('articles'));
    }

    public function create() {
        return view('pages.articles.create');
    }

    public function store(ArticleRequest $request) {
    	$input = $request->all();
    	$input['published_at'] = Carbon::now();
        Auth::user();
    	
    	Article::create($input);
        return redirect('/');
    }

    public function edit($articleID) {
    	$article = Article::findOrFail($articleID);
        return view('pages.articles.edit', compact('article'));
    }

    public function update($articleID, ArticleRequest $request) {
        $article = Article::findOrFail($articleID);
        $article->update($request->all());
        // return view('pages.editArticle', compact('article'));
        return redirect('/');
    }

    public function destroy($articleID) {
    	// delete article here
        return view('pages.articles.edit');
    }
    // ----------- end articles -------------
}