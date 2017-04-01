<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\log;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class loginController extends Controller
{
    public function login(){
      return view('auth.login');
    }

    public function auth(Request $request){
      try {
        if(!Sentinel::authenticate($request->all())){
          return redirect('/login')->with(['error' => 'Username atau Password salah!']);
        }else{
          $username = Sentinel::getUser()->name;
          switch (Sentinel::getUser()->roles()->first()->slug) {
            case 'admin':
              return redirect('/admin')->with(['info' => "Selamat datang admin $username", 'type' => 'info']);
              break;
            case 'user':
              $log = new Log;
              $log->record(Sentinel::getUser()->id, "Masuk ke dalam sistem");
              return redirect('/')->with(['info' => "Selamat datang admin $username", 'type' => 'info']);
              break;
            default:
              return redirect('/login')->with(['error' => 'Username atau Password salah!']);
              break;
          }
        }
      } catch (ThrottlingException $e) {
        $delay = $e->getDelay();
        return redirect('/login')->with(['error' => "Anda telah diblokir selama $delay detik!"]);
      }

    }

    public function logout(){
      $log = new Log;
      $log->record(Sentinel::getUser()->id, "Keluar dari sistem");
      Sentinel::logout();
      return redirect('/login');
    }
}
