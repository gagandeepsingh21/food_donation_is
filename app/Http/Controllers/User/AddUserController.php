<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddUserController extends Controller
{
    function adduser(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'pnumber'=>'required|min:10',
              'address' => 'required',
              'role' => 'required',
              'password'=>'required|min:4|max:30',
              'cpassword'=>'required|min:4|max:30|same:password'
          ]);

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->pnumber = $request->pnumber;
          $user->address = $request->address;
          $user->password = $request->password;
          $user->role = $request->role;
          $save = $user->save();

          if( $save ){
              return redirect()->back()->with('success','Admin created successfully!');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }
}
