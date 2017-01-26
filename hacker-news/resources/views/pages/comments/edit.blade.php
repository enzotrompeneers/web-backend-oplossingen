@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="breadcrumb">
                <a href="{{route('showArticle', ['articleID' => $comment->articleID])}}">← back to comments</a>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading clearfix">Edit comment
                <a class="btn btn-danger btn-xs edit-btn pull-right" href="{{route('deleteComments', ['commentID' => $comment->id])}}">
                    <i class="fa fa-btn fa-trash" title="delete"></i> delete comment
                </a>
                </div>
                <!-- New Task Form -->
                <div class="panel-content">
                <form 
                    action="{{ route('updateComments', ['commentID' => $comment->id]) }}"
                    method="post"
                    class="form-horizontal">

                    {{ csrf_field() }}

                    <!-- Article data -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="comment">Comment</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="comment" name="comment" maxlength="1000">
                            {{ $comment->comment }}
                            </textarea>
                        </div>
                    </div>

                    <!-- Add Article Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default" type="submit">
                            <i class="fa fa-pencil-square-o"></i> Edit comment
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop