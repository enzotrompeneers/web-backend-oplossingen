@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('partials.flash')
            <div class="panel panel-default">
                <div class="panel-heading">Article overview</div>
                    <div class="panel-content">
                        <ul class="article-overview">
                            @foreach ($articles as $article)
                                <li>
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
                                    </div> 
                                    <div class="info">
                                        0 points  | posted by {{$article->userID}} | <a href="comments/{{$article->id}}">0 comments</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop