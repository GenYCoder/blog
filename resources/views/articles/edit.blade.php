@extends('template')
@section('content')
	<h1>Edit: {!! $article->id !!}</h1>
	{!! Form::model($article, ['method'=>'PATCH','action'=>['pageController@update', $article->id]] ) !!}
	@include('articles._form',['submitTextButton'=>'Edit Article'])
	{!! Form::close() !!}
	
	@include('errors.list')
@stop