@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @include('partials.flash')
            <div class="breadcrumb">
                <a href="{{route('showArticle')}}">← back to overview</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    Article: {{$article->title}}
                    <a href="{{route('deleteArticle', ['article' => $article->id]) }}" class="btn btn-danger btn-xs pull-right">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                    </a>
                </div>
                <div class="panel-content">
                    <div class="vote">                
                        <div class="form-inline upvote">
                            <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>
                        </div>
                        <div class="form-inline upvote">
                            <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>
                        </div>
                    </div>
                    <div class="url">
                        <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                            @if ($article->userID == Auth::id())
                            <a href="{{ route('editArticle', ['articleID' => $article->id]) }}" class="btn btn-primary btn-xs edit-btn">edit</a>
                        @endif  
                    </div> 
                    <div class="info">
                        {{$article->points}} points  | posted by {{$article->username}} | <a href="comments/{{$article->id}}">{{$article->amountComments}} comments</a>
                    </div>
                    <div class="comments"> 
                        @if ($article->amountComments > 0)
                            <ul>
                                @foreach ($comments as $comment)
                                    <li>
                                        <div class="comment-body">{{ $comment->comment }}</div>
                                        <div class="comment-info">Posted by {{ $article->username }} on {{ $comment->created_at }}
                                           @if ($comment->user_id == Auth::id())
                                                <a class="btn btn-primary btn-xs edit-btn"
                                                href="{{ route('edit_comment', ['comment' => $comment->id]) }}">edit</a>
                                                <a class="btn btn-danger btn-xs edit-btn"
                                                href="{{ route('delete_comment', ['comment' => $comment->id]) }}">
                                                    <i class="fa fa-btn fa-trash" title="delete"></i>delete
                                                </a>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div>   
                                <p>No comments yet</p>
                            </div>
                        @endif                          
                        
                    </div>
                    <!-- New Task Form -->
                    <form action="{{ route('storeComment', ['articleID' => $article->id]) }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <!-- Comment data -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="body">Comment</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="body" name="comment" maxlength="1000"></textarea>
                            </div>
                        </div>
                        <!-- Add comment -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add comment</button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection