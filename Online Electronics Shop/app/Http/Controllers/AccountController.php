<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;

class AccountController extends Controller
{
    public function signup()
    {
       return view('signup');
    }
 
    public function register(Request $request)
    {
        $data = array();
        $data['first_name'] = $request -> first_name;
        $data['last_name'] = $request -> last_name;
        $data['email_address'] = $request -> email_address;
        $data['mailing_address'] = $request -> mailing_address;
        $data['user_name'] = $request -> user_name;
        $data['password'] = $request -> password;
        
        DB :: table('users') -> insert($data);
        return Redirect :: to('/login');
    }
 
    public function login()
    {
       if(Session :: get('user_name'))
       return Redirect :: to('/');
       return view('login');
    }
 
    public function check_auth(Request $request)
    {
       $user_name = $request -> user_name;
       $user_password = $request -> password;
 
       if($user_name === 'admin' && $user_password === 'admin')
       {
          Session :: put('user_name','admin');
          return Redirect :: to('/admin');
       }
       else
       {
           $user = DB :: table('users')
                    ->where('user_name',$user_name)
                    ->where('password',$user_password)
                    ->first();
            if($user == null)
            {
                Session :: put('invalid_message','username or password invalid');
               return Redirect :: to('/login');
            }
            else
            {
               Session :: put('user_name',$user_name);
               Session :: put('user_id',$user -> user_id);
               Session :: put('user_mail',$user -> email_address);
               return Redirect :: to('/');
            }
       }
 
      
    }

    public function logout()
    {
        Session :: put('user_name',null);
        return Redirect :: to('/');
    }

    public function edit_profile()
    {
       $user_id = intval(Session :: get('user_id'));
       $profile_info = DB :: table('users')
                     ->where('user_id',$user_id)
                     ->first();
       return view('edit_profile') -> with('profile',$profile_info);
    }

    public function update_profile(Request $request)
    {
       $data = array();
       $data['first_name'] = $request -> first_name;
       $data['last_name'] = $request -> last_name;
       $data['email_address'] = $request -> email_address;
       $data['mailing_address'] = $request -> mailing_address;
       $data['user_name'] = $request -> user_name;
       $data['password'] = $request -> password;
       $user_id = intval(Session :: get('user_id'));

          DB :: table('users')
               ->where('user_id',$user_id)
               ->update($data);
         
         return Redirect :: to('/');
    }

    
}
