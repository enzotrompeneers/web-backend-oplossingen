@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include ('errors.list')
            <div class="breadcrumb">
                <a href="../home">← back to overview</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Add article</div>
                <div class="panel-content">
                    {!! Form::open(['url' => '/'])!!}
                        @include ('pages.articles.partials.form', ['submitBtnText' => 'Add Article'])
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection