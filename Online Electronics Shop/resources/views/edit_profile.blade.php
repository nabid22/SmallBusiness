<link rel="stylesheet" href="{{asset('frontend/css/mainstyles/signup-style.css')}}">
@extends('header')
@section('body')
<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 align="center">User Info Update</h2>
                    </div>
                    <div class="card-body">
                        <form action = "{{url('/update-account')}}" method = "POST">
                           {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name" value="{{ $profile -> first_name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name" value="{{ $profile -> last_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email_address" value="{{ $profile -> email_address }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mailing_address" class="col-md-4 col-form-label text-md-right">Mailing
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="mailing_address" value="{{ $profile -> mailing_address }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="user_name" class="form-control" name="user_name" value="{{ $profile -> user_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="present_address" class="col-md-4 col-form-label text-md-right">Password
                                </label>
                                <div class="col-md-6">
                                    <input type="password" id="present_address" class="form-control" name="password" value="{{ $profile -> password }}" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Info
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

@endsection