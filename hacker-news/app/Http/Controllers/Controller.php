<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // -------------- articles --------------
    public function home() {
        $articles = Article::all();
        return view('pages.home', compact('articles'));
    }

    public function addArticle() {
        return view('pages.addArticle');
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

    // -------------- comments --------------
    public function showComments($articleID) {
    	$article = Article::find($articleID);
    	if (!$article) {
    		abort(404);
    	}
        return view('pages.addComment', compact('article'));
    }

    public function addComment($articleID) {
    	$article = Article::find($articleID);
    	if (!$article) {
    		abort(404);
    	}
    	// add comment here
        
    }return view('pages.addComment', compact('article'));

    public function editComment($commentID) {
    	// edit comment here
        return view('pages.editComment');
    }

    public function deleteComment($commentID) {
    	// delete comment here
        return view('pages.editComment');
    }
    // ------------ end comments -------------

    // ---------- login and register ---------
    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }
    // ------- end login and register --------
}