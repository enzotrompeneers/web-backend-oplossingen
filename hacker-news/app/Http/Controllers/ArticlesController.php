<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;

class ArticlesController extends Controller
{
    // -------------- articles --------------
    public function show() {
        $articles = Article::latest()->get();
        return view('pages.home', compact('articles'));
    }

    public function create() {
        return view('pages.addArticle');
    }

    public function store(CreateArticleRequest $request) {
    	$input = $request->all();
    	$input['published_at'] = Carbon::now();
    	
    	Article::create($input);
        return redirect('/');
    }

    public function edit($articleID) {
    	// edit article here
        return view('pages.editArticle');
    }

    public function destroy($articleID) {
    	// delete article here
        return view('pages.editArticle');
    }
    // ----------- end articles -------------
}