@extends('template')
@section('content')
	<div class="row">
		<div class="col-xs-6">
			<h1>Create a new article</h1>
			{!! Form::open(['url'=>'articles','class'=>'']) !!}
				@include('articles._form',['submitTextButton'=>'Add Article'])
			{!! Form::close() !!}
			
			@include('errors.list')
			
		</div>
		
	</div>
@stop