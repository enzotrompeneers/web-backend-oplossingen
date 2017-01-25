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
    public function showComments($articleID) {
        $article = Article::findOrFail($articleID);
        return view('pages.addComment', compact('article'));
    }

    public function addComment($articleID) {
        $article = Article::findOrFail($articleID);
        // add comment here
        return view('pages.addComment', compact('article'));
    }

    public function editComment($commentID) {
        // edit comment here
        return view('pages.editComment');
    }

    public function deleteComment($commentID) {
        // delete comment here
        return view('pages.editComment');
    }
    // ------------ end comments -------------
}