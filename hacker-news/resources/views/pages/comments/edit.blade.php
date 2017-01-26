@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include ('errors.list')
            <div class="breadcrumb">
                <a href="{{route('showArticle')}}">← back to overview</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Edit comment
                    <a class="btn btn-danger btn-xs pull-right" href="{{route('deleteComment', ['commentID' => $comment->id])}}">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                    </a>
                </div>
                <div class="panel-content">
                    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]])!!}
                        @include ('pages.articles.partials.form', ['submitBtnText' => 'Edit Article'])
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection