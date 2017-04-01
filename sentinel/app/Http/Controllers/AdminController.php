<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelaksana;
use App\Event;
use App\log;
use DB;
use Cartalyst\Sentinel\Users\EloquentUser;

class AdminController extends Controller
{
    public function index(){
      $data1 = DB::table('events')
        ->leftjoin('users', 'users.id', '=', 'events.uploader')
        ->select('users.name', DB::raw('count(uploader) as \'jumlah\''))
        ->where(DB::raw('year(tgl_mulai)'), '=', DB::raw('year(now())'))
        ->groupBy('events.uploader')
        ->get();
      $data2 = DB::table('events')
        ->select(DB::raw('MONTH(tgl_mulai) as bulan, count(MONTH(tgl_mulai)) as jumlah'))
        ->where(DB::raw('year(tgl_mulai)'), '=', DB::raw('year(now())'))
        ->groupBy(DB::raw('MONTH(tgl_mulai)'))
        ->get();
      $data3 = DB::table('events')
        ->select('*')
        ->orderBy('created_at', 'desc')
        ->limit(7)
        ->get();
      $data4 = DB::table('logs')
        ->select('users.name', 'logs.activity', 'logs.created_at')
        ->leftjoin('users', 'users.id', '=', 'logs.uid')
        ->orderBy('created_at', 'desc')
        ->limit(7)
        ->get();
      // dd($data3);
      return view('admin.dashboard', compact('data1', 'data2', 'data3', 'data4'));
    }

    public function statistik(){
      $data1 = DB::table('events')
        ->leftjoin('users', 'users.id', '=', 'events.uploader')
        ->select('users.id', 'users.name', DB::raw('count(uploader) as \'jumlah\''))
        ->where(DB::raw('year(tgl_mulai)'), '=', DB::raw('year(now())'))
        ->groupBy('events.uploader')
        ->get();
      $data2 = DB::table('events')
        ->select(DB::raw('MONTH(tgl_mulai) as bulan, count(MONTH(tgl_mulai)) as jumlah'))
        ->where(DB::raw('year(tgl_mulai)'), '=', DB::raw('year(now())'))
        ->groupBy(DB::raw('MONTH(tgl_mulai)'))
        ->get();
      return view('admin.statistik', compact('data1', 'data2'));
    }

    public function showPie(Request $request){
      if($request->id == "null"){
        $datatmp = DB::table('events')
          ->select('pelaksana as name', DB::raw('count(pelaksana) as \'jumlah\''))
          ->where(DB::raw('1'), '=', DB::raw('1'))
          ->groupBy('pelaksana');
      }else {
        if($request->id != "null" && $request->y == "null"){
          $datatmp = DB::table('events')
            ->select('pelaksana as name', DB::raw('count(pelaksana) as \'jumlah\''))
            ->where('uploader', '=', $request->id)
            ->groupBy('pelaksana');
        }else{
          if($request->id != "null" && $request->y != "null" && $request->m == "null"){
            $datatmp = DB::table('events')
              ->select('pelaksana as name', DB::raw('count(pelaksana) as \'jumlah\''))
              ->where([['uploader', '=', $request->id], [DB::raw('year(tgl_mulai)'), '=', $request->y]])
              ->groupBy('pelaksana');
          }else{
            $datatmp = DB::table('events')
              ->select('pelaksana as name', DB::raw('count(pelaksana) as \'jumlah\''))
              ->where([['uploader', '=', $request->id], [DB::raw('year(tgl_mulai)'), '=', $request->y], [DB::raw('month(tgl_mulai)'), '=', $request->m]])
              ->groupBy('pelaksana');
          }
        }
      }
      $data1 = $datatmp->get();
      $option1 = EloquentUser::all();
      $option2 = Event::select(DB::raw('distinct year(tgl_mulai) as year'))->where('uploader', '=', $request->id)->orderBy('year', 'desc')->get();
      $option3 = Event::select(DB::raw('distinct month(tgl_mulai) as month'))->where([['uploader', '=', $request->id], [DB::raw('year(tgl_mulai)'), '=', $request->y]])->orderBy('month', 'asc')->get();
      return view('admin.pie', compact('data1', 'option1', 'option2', 'option3'));
    }

    public function showLine(Request $request){
      if($request->y == "null"){
        $datatmp = DB::table('events')
          ->select('users.id as uid', 'users.name as name', DB::raw('month(tgl_mulai) as bulan, count(month(tgl_mulai)) as jumlah'))
          ->join('users', 'users.id', '=', 'events.uploader')
          ->where(DB::raw('year(tgl_mulai)'), '=', DB::raw('year(now())'))
          ->groupBy(DB::raw('month(tgl_mulai)'), 'users.id');
          $datatabletmp = DB::table('events')
            ->select(DB::raw('month(tgl_mulai) as bulan, count(month(tgl_mulai)) as jumlah'))
            ->where(DB::raw('year(tgl_mulai)'), '=', DB::raw('year(now())'))
            ->groupBy(DB::raw('month(tgl_mulai)'));
      }else{
        $datatmp = DB::table('events')
          ->select('users.id as uid', 'users.name as name', DB::raw('month(tgl_mulai) as bulan, count(month(tgl_mulai)) as jumlah'))
          ->join('users', 'users.id', '=', 'events.uploader')
          ->where(DB::raw('year(tgl_mulai)'), '=', $request->y)
          ->groupBy(DB::raw('month(tgl_mulai)'), 'users.id');
        $datatabletmp = DB::table('events')
          ->select(DB::raw('month(tgl_mulai) as bulan, count(month(tgl_mulai)) as jumlah'))
          ->where(DB::raw('year(tgl_mulai)'), '=', $request->y)
          ->groupBy(DB::raw('month(tgl_mulai)'));
      }
      $data2 = $datatmp->get()->groupBy('uid')->toArray();
      $datatable = $datatabletmp->get();
      $option2 = Event::select(DB::raw('distinct year(tgl_mulai) as year'))->get();
      return view('admin.line', compact('data2', 'datatable', 'option2'));
    }
}
