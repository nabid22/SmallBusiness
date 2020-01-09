<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class AnnouncementController extends Controller
{
    public function add_announcement()
    {
        return view('admin.add_announcement');
    }
    public function save_announcement(Request $request)
    {
         $data = array();
         $data['announcement_title'] = $request -> announcement_title;
         $data['announcement_detail'] = $request -> announcement_detail;
         $data['publication_date'] = date('d/m/Y');
         
         DB :: table('announcements') -> insert($data);
         Session :: put('save_message','Announcement saved successfully!!!');
         return Redirect :: to('/admin/all-announcement');
    }

    public function all_announcement()
    {
        $all_announcements = DB :: table('announcements')
        ->orderBy('announce_id','desc')
        ->paginate(10);
        return view('admin.all_announcement',['all_announcements' => $all_announcements]);
    }

    public function delete_announcement($announce_id)
    {
         DB :: table('announcements')
               ->where('announce_id',$announce_id)
               ->delete();
        Session :: put('save_message','Announcement deleted successfully!!!');
        return Redirect :: to('/admin/all-announcement');
    }
}
