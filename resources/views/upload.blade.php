@extends('template')

@section('content')

<h1>Files Uploader</h1>
{!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
<div class="form-group">

{!! Form::file('myFiles[]', array('class'=>'', 'multiple'=>true)) !!}

</div>

{!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
{!! Form::close() !!}

@stop