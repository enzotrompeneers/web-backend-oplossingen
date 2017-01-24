<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
        $name = 'Enzo Trompeneers';
        return view('pages.home', compact('name'));
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
}