@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
                        <ul>
                            <li>
                                <div class="comment-body">test</div>
                                <div class="comment-info">
                                    Posted by enzo on 2017-01-24 16:51:01                        
                                    <a href="../../comments/edit/{{$article->id}}" class ="btn btn-primary btn-xs edit-btn">edit</a>
                                    <a href="../../comments/delete/{{$article->id}}" class ="btn btn-danger btn-xs edit-btn">
                                        <i class="fa fa-btn fa-trash" title="delete"></i> delete 
                                    </a>                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- New Task Form -->
                    <form action="../../comments/add/{{$article->id}}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <!-- Comment data -->
                        <div class="form-group">
                            <label for="comment" class="col-sm-3 control-label">Comment</label>
                            <div class="col-sm-6">
                                <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="{{$article->id}}" value="10">
                        <!-- Add comment -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add comment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection