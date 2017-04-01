<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;
use App\Pelaksana;

class registrationController extends Controller
{
    public function register(){
      return view('auth.register');
    }

    public function store(Request $request){
      $user = Sentinel::registerAndActivate($request->all());
      $role = Sentinel::findRoleBySlug('user');
      $role->users()->attach($user);
      return redirect('/admin/user')->with(['info' => "Admin <strong>$user->name</strong telah ditambahkan", 'type' => 'info']);
    }

    public function getUserInfo(){
      $users = EloquentUser::all();
      return view('admin.user.user', compact('users'));
    }

    public function edit($id){
      $user = EloquentUser::find($id);
      $password = $user->getUserPassword();
      $pelaksana = Pelaksana::where('user_id', $id)->get();
      return view('admin.user.edit', compact('user', 'password', 'pelaksana'));
    }

    public function update(Request $request, $id){
      $userid = EloquentUser::find($id)->id;
      $username = EloquentUser::find($id)->name;
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
      //  dd($userid, $request->except('pelaksana'), $pelaksana);
      return redirect('/admin/user/' . $userid . '/edit')->with(['info' => "Data admin <strong>$username</strong> telah diperbaharui", 'type' => 'info']);
    }

    public function destroy($id){
      $username = EloquentUser::find($id)->name;
      $user = EloquentUser::find($id);
      $user->delete();
      return redirect()->back()->with(['info' => "<strong>$username</strong> telah di <strong>MUSNAKAN</strong>", 'type' => 'info']);
    }
}
