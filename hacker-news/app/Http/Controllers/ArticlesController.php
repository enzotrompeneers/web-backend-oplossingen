<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller
{
    // -------------- articles --------------
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function show() {
        $articles = Article::latest()->get();
        $users = User::latest()->get();
        return view('pages.articles.show', compact('articles', 'users'));
    }

    public function create() {
        return view('pages.articles.create');
    }

    public function store(ArticleRequest $request) {
    	$input = $request->all();
        $input['userID'] = Auth::user()->id;
    	$input['published_at'] = Carbon::now();
    	Article::create($input);
        Session()->flash('flashMessage', 'article ' . $input['title'] . ' created succesfully');
        return redirect('/');
    }

    public function edit($articleID) {
    	$article = Article::findOrFail($articleID);
        return view('pages.articles.edit', compact('article'));
    }

    public function update($articleID, ArticleRequest $request) {
        $article = Article::findOrFail($articleID);
        $article->update($request->all());
        return redirect('/');
    }
    public function delete($articleID) {
        // delete session here
        return view('/');
    }

    public function destroy($articleID) {
    	// destroy article here
        return view('/');
    }
    // ----------- end articles -------------
}