@extends('template')

@section('content')
<div class="row">
    <div class="col-xs-4">
        {!! Form::open(array('url'=>'/auth/login', 'method'=>'POST')) !!}
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email" class="control-label">eMail:</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="enter your password">
            </div>
            <div class="form-group">
                <input id="remember" type="checkbox" name="remember">
                <label>Remember Me</label>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        {!! Form::close() !!}  
    </div>
    
</div>

@stop