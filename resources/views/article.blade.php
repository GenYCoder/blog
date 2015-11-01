@extends('template')

@section('content')
	{!! Form::open(['url'=>'article']) !!}
		<p>
			{!! Form::label('title','Title:') !!}
			{!! Form::text('title', null) !!}
			
		</p>
		<p>
			{!! Form::label('content', 'Content:') !!} 
			{!! Form::textarea('content', null) !!} 
			
		</p>
		<p>
			{!! Form::label('published_at', 'Publised On') !!}
			{!! Form::input('date','published_at', date('Y-m-d')) !!}
		</p>
		{!! Form::submit('Add Article') !!}
	{!! Form::close() !!}
	
	@if ($errors->any())
		@foreach ($errors->all() as $error)
			{{$error}}<br>
		@endforeach
	@endif
	{{ var_dump($errors) }}
@stop