@inject('formatter', 'App\Helpers\FileSize')
@extends('template')

@section('content')
	<div class="rows">
        <div class="xs-col-12">
	        {{$uploadCount}} file has been uploaded successfully. Upload again? <a href='/upload'>here</a>
		</div>
	</div>
@stop