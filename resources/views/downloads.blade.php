@inject('formatter', 'App\Helpers\FileSize')
@extends('template')

@section('content')
	<div class="rows">
        <div class="xs-col-12">
			@if (Session::has('login'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ Session::get('login') }}
				</div>
			@endif        	
	        <h1>Downloads</h1>
	        <p>Right click a file and select <strong>Save As</strong></p>
		</div>
		<div class="xs-col-12">
			<table class="table">
				<thead>
					<tr>
						<th>File Name</th>
						<th>Size</th>
						<th>Last Updated</th>
					</tr>
					
				</thead>

@foreach($data as $file)
				<tr>
					<td><a href="{{ $file['filelocation'] }}" target="_blank">{{ $file['filename']}}</a></td>
					<td>{{ $formatter->formatSizeUnits( $file['filesize'] ) }}</td>
					<td>{{ $file['updated_at'] }}</td>
				</tr>

@endforeach
			</table>
		</div>
	</div>
@stop