<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Mail;
use Session;
use Redirect;
class MailSend extends Controller
{

    public function index()
    {
        if(Session :: get('user_name') == null)
        return Redirect :: to('/login');
        return view('emails.contact');
    }
    public function send_mail(Request $request)
    {
       
        $this -> validate($request,[
          
             'sender_name' => 'required',
             'return_email_address' => 'required|email',
             'message' => 'required'
        ]);
       
             Session :: put('sender_name',$request -> sender_name);
             Session :: put('return_address',$request -> return_email_address);
             Session :: put( 'sender',Session :: get('user_mail'));
             Session :: put( 'subject',$request -> email_subject);
             

        \Mail::to('aniscseru6125@gmail.com')
              ->send(new SendMail($request -> message));
        return view('emails.thanks');
    }
}