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
                        <div class="form-group">
                            {!! Form::label('title', 'Title (max. 255 characters)', ['class'=> 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">      
                                {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                            </div>
                        </div> 
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('url', 'URL', ['class'=> 'col-sm-3 control-label']) !!} 
                            <div class="col-sm-6">      
                                {!! Form::text('url', null, ['class'=> 'form-control']) !!}
                            </div>
                        </div> 
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {!! Form::submit('Add Article', ['class'=> 'btn btn-default']) !!}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection