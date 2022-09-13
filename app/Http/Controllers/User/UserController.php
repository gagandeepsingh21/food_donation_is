<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    

    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'pnumber'=>'required',
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
          $user->password = \Hash::make($request->password);
          $user->role = $request->role;
          $save = $user->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

        function check(Request $request){
        //Validate inputs
        $request->validate([
              'email'=>'required|email|exists:users,email',
              'password'=>'required|min:4|max:30'
        ]);

        $cred = $request->only('email','password');
        
        if( Auth::attempt($cred)){
            return redirect()->route('user.dashboard')->with('login successfull');
        }else{
            return redirect()->route('user.userLogin')->with('fail','Incorrect credentials');
        }
    }

    
    function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.userLogin');
    }
}
