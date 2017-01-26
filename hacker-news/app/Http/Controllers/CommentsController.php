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
        $comments = Comment::latest()->get();
        return view('pages.comments.create', compact('article', 'comments'));
    }

    public function create($articleID) {
        $article = Article::findOrFail($articleID);
        return view('pages.comments.create', compact('article'));
    }

    public function store(CommentRequest $request, $articleID) {
        $input = $request->all();
        $input['articleID'] = $articleID;
    	Comment::create($input);
        $article = Article::findOrFail($articleID);
        $article->amountComments ++;
        $article->update($request->all());
        Session()->flash('flashMessage', 'comment added succesfully');
        return back();
    }

    public function edit($commentID) {
        $comment = Comment::find($commentID);
        if(!$comment) {
            return redirect(route('showArticle'));
        }
        return view('pages.comments.edit', compact('comment'));
    }

    public function update(CommentRequest $request, $commentID) {
        $comment = Comment::findOrFail($commentID);
        $comment->update($request->except(['articleID'])); // for safety (e ignoring "possible existence") 
        // return redirect(route('updateComments', compact('commentID')));
        return redirect(route('editComments', compact('commentID')));
    }

    public function deleteConfrimation($commentID) {
        $comment = Comment::findOrFail($commentID);
        $delete = true;
        return view('pages.comments.edit', compact('comment', 'delete'));
    }

    public function destroy($commentID) {
        $comment = Comment::find($commentID);
        if($comment) {
            $article = Article::findOrFail($comment->articleID);
            if($article) {
                if($comment->delete()) {
                    $article->amountComments--;
                    $article->save();
                }
            }
        }
        return redirect(route('showArticle'));
    }
    // ------------ end comments -------------
}