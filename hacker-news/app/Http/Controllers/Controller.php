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

    public function home() {
        $articles = Article::all();
        return view('pages.home', compact('articles'));
    }

    public function addArticle() {
        return view('pages.addArticle');
    }

    public function editArticle() {
        return view('pages.editArticle');
    }

    public function addComment() {
        return view('pages.addComment');
    }

    public function editComment() {
        return view('pages.editComment');
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }
}