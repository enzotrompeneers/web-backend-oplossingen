<!-- temporary -->
{!! Form::hidden('userID', 1) !!}

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
        {!! Form::submit($submitBtnText, ['class'=> 'btn btn-default']) !!}
</div>