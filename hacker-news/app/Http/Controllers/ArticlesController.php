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
    public function home() {
        $articles = Article::latest()->get();
        return view('pages.home', compact('articles'));
    }

    public function addArticle() {
        return view('pages.addArticle');
    }

    public function saveArticle(CreateArticleRequest $request) {
    	$input = $request->all();
    	$input['published_at'] = Carbon::now();
    	
    	Article::create($input);
        return redirect('/');
    }

    public function editArticle($articleID) {
    	// edit article here
        return view('pages.editArticle');
    }

    public function deleteArticle($articleID) {
    	// delete article here
        return view('pages.editArticle');
    }
    // ----------- end articles -------------
}