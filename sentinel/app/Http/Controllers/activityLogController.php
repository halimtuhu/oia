<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\log;
use DB;

class activityLogController extends Controller
{
    public function index(){
      $logs = DB::table('logs')
        ->select('users.name', 'logs.activity', 'logs.created_at')
        ->leftjoin('users', 'users.id', '=', 'logs.uid')
        ->orderBy('created_at', 'desc')
        ->get();
      return view('admin.log', compact('logs'));
    }

    public function clear(Request $request){
      log::getQuery()->delete();
      return redirect('/admin/log')->with(['info' => 'Rekap aktifitas user di sistem telah dihapus', 'type' => 'info']);
    }
}
