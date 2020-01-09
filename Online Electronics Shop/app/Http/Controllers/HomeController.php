<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class HomeController extends Controller
{
   public function index()
   {
       $all_announcements = DB :: table('announcements')
                            ->orderBy('announce_id','desc')
                            ->limit(10)
                            ->get();
        return view('homepage',['all_announcements' => $all_announcements]);
   }

  public function admin()
  {
     return view('admin_panel');
  }

  public function all_announcements()
  {
   $all_announcements = DB :: table('announcements')
   ->orderBy('announce_id','desc')
   ->paginate(10);
return view('all_announcement',['all_announcements' => $all_announcements]);
  }
  
}
