<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;
use Request;
use Carbon\Carbon;

class CommentsController extends Controller
{
    // -------------- comments --------------
    public function show($articleID) {
        $article = Article::findOrFail($articleID);
        return view('pages.comments.create', compact('article'));
    }

    public function create($articleID) {
        $article = Article::findOrFail($articleID);
        // add comment here
        return view('pages.comments.create', compact('article'));
    }

    public function edit($commentID) {
        // edit comment here
        return view('pages.comments.edit');
    }

    public function delete($commentID) {
        // delete comment here
        return view('pages.comments.edit');
    }
    // ------------ end comments -------------
}