<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;
use App\Pelaksana;
use App\event;
use App\log;

class UserController extends Controller
{
    public function index(){
      $events = event::select('*')->where('uploader', '=', Sentinel::check()->id)->orderBy('created_at', 'desc')->limit(7)->get();
      $imageurl = array();
      foreach ($events as $key => $event) {
        $image = $event->img_pre . $event->img_live . $event->img_post;
        $images = explode("; ", $image);
        $images = array_filter(array_map('trim',$images),'strlen');
        foreach ($images as $pos => $image) {
          $imageurl[] = "/storage/".$event->uploader."/".$event->id."/".$image;
        }
      }
      return view('user.dashboard', compact('events', 'imageurl'));
    }

    public function profile(){
      $user = Sentinel::check();
      $pelaksana = Pelaksana::where('user_id', $user->id)->get();
      return view('user.profile', compact('user', 'pelaksana'));
    }

    public function update(Request $request, $id){
      $userid = EloquentUser::find($id)->id;
      echo Sentinel::update($userid, $request->except('pelaksana'));


      $pelaksana = explode("\r\n", $request->pelaksana);
      $pelaksana = array_filter(array_map('trim',$pelaksana),'strlen');
      $pelaksanadel = Pelaksana::where('user_id', $id);
      $pelaksanadel->delete();
      foreach ($pelaksana as $key => $value) {
        $pelak = new Pelaksana;
        $pelak->user_id = $userid;
        $pelak->pelaksana = $value;
        echo $pelak->save();
      }
      $log = new Log;
      $log->record(Sentinel::getUser()->id, "Mengubah data profil mereka");
      //  dd($userid, $request->except('pelaksana'), $pelaksana);
      return redirect('/profil');
    }
}
