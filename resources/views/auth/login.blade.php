@extends('layouts.login')
@section('title','Login')
@section('content')

    <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}


        <label>
            <input id="email" type="email" class="form-control" placeholder="Enter your Email Address" name="email"
                   value="{{ old('email') }}">
        </label>


        <label>
            <input id="password" type="password" class="form-control" placeholder="Enter your Password" name="password">
        </label>


        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
        @endif

        @if ($errors->has('password'))
            <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
        @endif


        <input type="submit" value="Login">


    </form>

@endsection
