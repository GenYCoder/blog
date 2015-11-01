@extends('template')

@section('content')

@foreach($files as $file)
	<a href="{!! $file !!}">{!! str_replace('/assets/','',$file) !!}</a><br>
@endforeach
@stop