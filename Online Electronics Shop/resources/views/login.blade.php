<link rel="stylesheet" href="{{asset('frontend/css/mainstyles/login-style.css')}}">
@extends('header')
@section('body')
<div class="wrapper fadeInDown">
          
    <div id="formContent">
        @if(Session :: get('invalid_message'))
            <div class="alert alert-danger col-md-12">
                <strong>{{ Session :: get('invalid_message') }}</strong>
            </div>
            
            <?php Session :: put('invalid_message',null); ?>
            @endif
        <form action = "{{ url('/check_auth') }}" method = "POST">
           {{ csrf_field() }}
            <input type="text" id="login" class="fadeIn second" name="user_name" placeholder="username">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
@endsection