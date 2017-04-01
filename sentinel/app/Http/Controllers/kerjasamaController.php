<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;
use App\log;
use App\event;
use App\kerjasama;
use App\Pelaksana;
use Illuminate\Support\Facades\Storage;


class kerjasamaController extends Controller
{
    public function index()
    {
      if(Sentinel::getUser()->inRole('admin')){
        $kerjasamas = kerjasama::all();
        return view('admin.kerjasama.kerjasama', compact('kerjasamas'));
      }else{
        $kerjasamas = kerjasama::select('*')->where('uploader', '=', Sentinel::getUser()->id)->orderBy('created_at', 'desc')->get();
        return view('user.kerjasama.kerjasama', compact('kerjasamas'));
      }
    }

    public function create()
    {
      if(Sentinel::getUser()->inRole('admin')){
        return view('admin.kerjasama.tambah', compact('kerjasamas'));
      }else{
        return view('user.kerjasama.tambah', compact('kerjasamas'));
      }
    }

    public function store(Request $request)
    {
      $kerjasama = new kerjasama;
      $kerjasama->instansi = $request['instansi'];
      $kerjasama->jenis = $request['jenis'];
      $kerjasama->bentuk = $request['bentuk'];
      $kerjasama->isi = $request['isi'];
      $kerjasama->tgl_mulai = date("Y-m-d", strtotime($request->tgl_mulai));
      $kerjasama->tgl_expired = date("Y-m-d", strtotime($request->tgl_expired));
      $kerjasama->uploader = Sentinel::getUser()->id;
      $kerjasama->save();

      $log = new Log;
      $log->record(Sentinel::getUser()->id, 'Menambahkan <a href="/admin/kegiatan/'.$kerjasama->id.'/edit">kerjasama</a> baru');

      if(Sentinel::getUser()->inRole('admin')){
        return redirect('/admin/kerjasama')->with(['info' => "Data kerjasama dengan <strong>$kerjasama->instansi</strong> telah ditambahkan", 'type' => 'info']);
      }else{
        return redirect('/kerjasama')->with(['info' => "Data kerjasama dengan <strong>$kerjasama->instansi</strong> telah ditambahkan", 'type' => 'info']);
      }

    }

    public function show($id)
    {
        //
    }

    public function edit(kerjasama $kerjasama)
    {
      if(Sentinel::getUser()->inRole('admin')){
        return view('admin.kerjasama.edit', compact('kerjasama'));
      }else{
        return view('user.kerjasama.edit', compact('kerjasama'));
      }
    }

    public function update(Request $request, $id)
    {
      $kerjasama = kerjasama::find($id);
      $kerjasama->instansi = $request['instansi'];
      $kerjasama->jenis = $request['jenis'];
      $kerjasama->bentuk = $request['bentuk'];
      $kerjasama->isi = $request['isi'];
      $kerjasama->tgl_mulai = date("Y-m-d", strtotime($request->tgl_mulai));
      $kerjasama->tgl_expired = date("Y-m-d", strtotime($request->tgl_expired));
      $kerjasama->save();

      $log = new Log;
      $log->record(Sentinel::getUser()->id, 'Menambahkan <a href="/admin/kegiatan/'.$kerjasama->id.'/edit">kerjasama</a> baru');

      if(Sentinel::getUser()->inRole('admin')){
        return redirect('/admin/kerjasama')->with(['info' => "Data kerjasama dengan instansi <strong>$kerjasama->instansi</strong> telah diperbaharui", 'type' => 'info']);
      }else{
        return redirect('/kerjasama')->with(['info' => "Data kerjasama dengan instansi <strong>$kerjasama->instansi</strong> telah diperbaharui", 'type' => 'info']);
      }

    }

    public function destroy($id)
    {

      if(Sentinel::getUser()->inRole('admin')){
        $kerjasama = kerjasama::find($id);
        $instansi = $kerjasama->instansi;

        $kerjasama->delete();
        return redirect('/admin/kerjasama')->with(['info' => "Data kerjasama dengan instansi <strong>$instansi</strong> telah dihapus", 'type' => 'info']);
      }else{
        return redirect('/kerjasama')->with(['info' => "Anda tidak diperbolehkan mengahapus data inputan anda!", 'type' => 'info']);
      }
    }
}
