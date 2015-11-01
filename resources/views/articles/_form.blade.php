
{!! Form::label('title','Title:', ['class'=>'control-label']) !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
		
{!! Form::label('content', 'Content:', ['class'=>'control-label']) !!} 
{!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
		
{!! Form::label('tagList','Tags:', ['class'=>'control-label']) !!}
{!! Form::select('tagList[]', $tags, null, ['id'=>'tagList', 'class'=>'form-control', 'multiple']) !!}

{!! Form::label('published_at', 'Publised On', ['class'=>'control-label']) !!}
{!! Form::input('date','published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
<br>
{!! Form::submit($submitTextButton, ['class'=>'btn btn-primary']) !!}

@section('footer')
<script>
	$('#tagList').select2({
		'placeholder':'Pick a tag'
	});
</script>
@stop