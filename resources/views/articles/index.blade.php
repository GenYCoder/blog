@extends('template')
@section('content')
	@foreach ($articles as $article)
		<article>
			<a href="/articles/{{$article->id}}"><h3>{{$article->title}}</h3></a>
			<p>{{$article->content}}</p>
		</article>
	@endforeach
@stop
@section('footer')

@stop