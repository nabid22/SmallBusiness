<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;


class AdminController extends Controller
{
    
    public function delete_user($user_id)
    {
        DB :: table('users')
         ->where('user_id',$user_id)
         ->delete();
        
         Session :: put('save_message','User deleted successfully !!!');
         return Redirect :: to('/admin/users');
    }

    public function get_all_users()
    {
        $users = DB :: table('users') -> paginate(10);
        return view('admin.all_users') -> with('users',$users);
    }
}
