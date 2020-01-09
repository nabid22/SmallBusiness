<link rel="stylesheet" href="{{asset('frontend/css/mainstyles/signup-style.css')}}">
@extends('header')
@section('body')
<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class ="text-center">Contact Us</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/send-email') }}" method="POST">
                           {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="sender_name" class="col-md-4 col-form-label text-md-right">sender Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sender_name">
                                    @if($errors -> has("sender_name"))
                                     <small class = "form-text alert alert-danger">{{ $errors -> first("sender_name") }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="return_email_address" class="col-md-4 col-form-label text-md-right">Return Email Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="return_email_address">
                                    @if($errors -> has("return_email_address"))
                                     <small class = "form-text alert alert-danger">{{ $errors -> first("return_email_address") }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Select Email Subject
                                    </label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "email_subject">
                                        <option>I can't open my account</option>
                                        <option>Forgot password link does not recieved</option>
                                        <option>What is your office phone number?</option>
                                        <option>Return email does not recieved</option>
                                       
                                      </select>
                                      @if($errors -> has("email_subject"))
                                      <small class = "form-text alert alert-danger">{{ $errors -> first("email_subject") }}</small>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mailing_address" class="col-md-4 col-form-label text-md-right">Message
                                </label>
                                <div class="col-md-6">
                                   <textarea class="form-control" rows = "5" name="message"></textarea>
                                   @if($errors -> has("message"))
                                   <small class = "form-text alert alert-danger">{{ $errors -> first("message") }}</small>
                                   @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    Send
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection