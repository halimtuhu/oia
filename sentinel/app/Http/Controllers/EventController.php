<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;
use App\log;
use App\event;
use App\Pelaksana;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function index()
    {
        if(Sentinel::getUser()->inRole('admin')){
          $events = event::select('*')->orderBy('created_at', 'desc')->get();
          return view('admin.event.kegiatan', compact('events'));
        }else{
          $events = event::select('*')->where('uploader', '=', Sentinel::getUser()->id)->orderBy('created_at', 'desc')->get();
          return view('user.event.kegiatan', compact('events'));
        }
    }

    public function create()
    {
        $pelaksana = Pelaksana::where('user_id', Sentinel::check()->id)->get();
        if(Sentinel::getUser()->inRole('admin')){
          return view('admin.event.create', compact('pelaksana'));
        }else{
          return view('user.event.create', compact('pelaksana'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'judul' => 'required',
          'pelaksana' => 'required',
          'tgl_mulai' => 'required',
          'tgl_selesai' => 'required',
          'tempat' => 'required',
        ]);

        $event = new Event;
        $event->judul = $request['judul'];
        $event->pelaksana = $request['pelaksana'];
        $event->tgl_mulai = date("Y-m-d", strtotime($request->tgl_mulai));
        $event->tgl_selesai = date("Y-m-d", strtotime($request->tgl_selesai));
        $event->tempat = $request['tempat'];
        $event->uploader = Sentinel::getUser()->id;
        $event->desk_pre = $request['desk_pre'];
        $event->desk_live = $request['desk_live'];
        $event->desk_post = $request['desk_post'];
        $event->save();

        $log = new Log;
        $log->record(Sentinel::getUser()->id, 'Menambahkan <a href="/admin/kegiatan/'.$event->id.'/edit">event</a> baru');

        if(Sentinel::getUser()->inRole('admin')){
          return redirect('/admin/kegiatan')->with(['info' => "Kegiatan <strong>".addslashes($event->judul)."</strong> telah ditambah", 'type' => 'info']);
        }else{
          return redirect('/kegiatan')->with(['info' => "Kegiatan <strong>".addslashes($event->judul)."</strong> telah ditambah", 'type' => 'info']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(event $kegiatan)
    {
        $preimage = explode("; ", $kegiatan->img_pre);
        $preimage = array_filter(array_map('trim',$preimage),'strlen');

        $liveimage = explode("; ", $kegiatan->img_live);
        $liveimage = array_filter(array_map('trim',$liveimage),'strlen');

        $postimage = explode("; ", $kegiatan->img_post);
        $postimage = array_filter(array_map('trim',$postimage),'strlen');

        $pelaksana = Pelaksana::where('user_id', $kegiatan->uploader)->get();

        if(Sentinel::getUser()->inRole('admin')){
          return view('admin.event.edit', compact('kegiatan', 'preimage', 'liveimage', 'postimage', 'pelaksana'));
        }else{
          return view('user.event.edit', compact('kegiatan', 'preimage', 'liveimage', 'postimage', 'pelaksana'));
        }
    }

    public function update(Request $request, $id)
    {
      $user = Event::find($id)->uploader;
      $eventid = Event::find($id)->id;
      $preimages = $request->file('preimg');
      $preimagedata = "";
      $liveimages = $request->file('liveimg');
      $liveimagedata = "";
      $postimages = $request->file('postimg');
      $postimagedata = "";

      if(!empty($preimages)){
        foreach ($preimages as $key => $image) {
          if($image->isValid()){
            $imgname = $eventid."pre".date("YmdHis").$key.".".$image->extension();
            $image->storeAs('public/'.$user.'/'.$eventid, $imgname);
            $preimagedata = $preimagedata.$imgname . "; ";
          }
        }
      }
      if(!empty($liveimages)){
        foreach ($liveimages as $key => $image) {
          if($image->isValid()){
            $imgname = $eventid."live".date("YmdHis").$key.".".$image->extension();
            $image->storeAs('public/'.$user.'/'.$eventid, $imgname);
            $liveimagedata = $liveimagedata.$imgname . "; ";
          }
        }
      }
      if(!empty($postimages)){
        foreach ($postimages as $key => $image) {
          if($image->isValid()){
            $imgname = $eventid."post".date("YmdHis").$key.".".$image->extension();
            $image->storeAs('public/'.$user.'/'.$eventid, $imgname);
            $postimagedata = $postimagedata.$imgname . "; ";
          }
        }
      }

      $event = Event::find($id);
      $event->judul = $request->judul;
      $event->pelaksana = $request->pelaksana;
      $event->tgl_mulai = date("Y-m-d", strtotime($request->tgl_mulai));
      $event->tgl_selesai = date("Y-m-d", strtotime($request->tgl_selesai));
      $event->tempat = $request->tempat;
      $event->uploader = Event::find($id)->uploader;
      $event->desk_pre = $request->desk_pre;
      $event->desk_live = $request->desk_live;
      $event->desk_post = $request->desk_post;
      $event->img_pre = $preimagedata . $event->img_pre;
      $event->img_live = $liveimagedata . $event->img_live;
      $event->img_post = $postimagedata . $event->img_post;
      $event->save();

      $log = new Log;
      $log->record(Sentinel::getUser()->id, 'Mengubah data suatu <a href="/admin/kegiatan/'.$event->id.'/edit">event</a>');

      if(Sentinel::getUser()->inRole('admin')){
        return redirect('/admin/kegiatan/'.$eventid.'/edit')->with(['info' => "Data kegiatan <strong>".addslashes($event->judul)."</strong> telah diperbaharui", 'type' => 'info']);
      }else {
        return redirect('/kegiatan/'.$eventid.'/edit')->with(['info' => "Data kegiatan <strong>".addslashes($event->judul)."</strong> telah diperbaharui", 'type' => 'info']);
      }

    }

    public function destroy($id)
    {
        if(Sentinel::getUser()->inRole('admin')){
          $event = event::find($id);
          Storage::deleteDirectory('public/'.$event->uploader.'/'.$id);
          $event->delete();
          return redirect('/admin/kegiatan')->with(['info' => "Kegiatan <strong>".addslashes($event->judul)."</strong> telah dihapus", 'type' => 'info']);
        }else{
          return redirect('/kegiatan')->with(['info' => "Kegiatan <strong>".addslashes($event->judul)."</strong> telah dihapus", 'type' => 'info']);
        }

    }

    public function delImage($userid, $eventid, $imagename)
    {
      echo $userid . "<br>";
      echo $eventid . "<br>";
      echo $imagename . "<br>";
      echo "<br>";

      $event = event::find($eventid);

      if (strpos($imagename, 'pre')){
        $event->img_pre = str_replace($imagename.";","",$event->img_pre);
        Storage::delete('public/'.$userid.'/'.$eventid.'/'.$imagename);
        $msg = "Gambar dari prakegiatan <strong>".addslashes($event->judul)."</strong> telah dihapus";
      }elseif (strpos($imagename, 'live')){
        $event->img_live = str_replace($imagename.";","",$event->img_live);
        Storage::delete('public/'.$userid.'/'.$eventid.'/'.$imagename);
        $msg = "Gambar dari kegiatan <strong>".addslashes($event->judul)."</strong> telah dihapus";
      }elseif (strpos($imagename, 'post')){
        $event->img_post = str_replace($imagename.";","",$event->img_post);
        Storage::delete('public/'.$userid.'/'.$eventid.'/'.$imagename);
        $msg = "Gambar dari paskakegiatan <strong>".addslashes($event->judul)."</strong> telah dihapus";
      }

      $event->save();
      if(Sentinel::getUser()->inRole('admin')){
        return redirect('/admin/kegiatan/'.$eventid.'/edit')->with(['info' => $msg, 'type' => 'info']);
      }else{
        return redirect('/kegiatan/'.$eventid.'/edit')->with(['info' => $msg, 'type' => 'info']);
      }
    }

}
