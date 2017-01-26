<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Request;
use Carbon\Carbon;
use Auth;

class CommentsController extends Controller
{
    // -------------- comments --------------
    public function show($articleID) {
        $article = Article::findOrFail($articleID);
        return view('pages.comments.create', compact('article'));
    }

    public function create($articleID) {
        $article = Article::findOrFail($articleID);
        return view('pages.comments.create', compact('article'));
    }


    public function store(CommentRequest $request, $articleID) {
        $input = $request->all();
        $input['articleID'] = $articleID;
    	Comment::create($input);
        Session()->flash('flashMessage', 'comment added succesfully');
        return back();
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