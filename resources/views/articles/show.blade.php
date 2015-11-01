@extends('template')
@section('content')
	<h1>{{$article->title}}</h1>
	<p>{{$article->content}}</p>
	<p>Published at {{$article->created_at}}</p>
	@unless ($article->tags->isEmpty())
		Tags:
		<ul>
		@foreach ($article->tags as $tag)
			<li>{{$tag->name}}</li>
		@endforeach
	</ul>
	@endunless
@stop