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
              return redirect()->route('user.userLogin');
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
        $email= $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password,'status'=> 1])){
            return redirect()->route('user.dashboard');
        }elseif(Auth::attempt(['email' => $email, 'password' => $password,'status'=> 0])){
            return redirect()->route('user.userLogin')->with('fail','Your account has been blocked. Please contact administrator!');
        }else{
             return redirect()->route('user.userLogin')->with('fail','Your email or Password is incrorrect! Please check again');

        }

        // $creds = $request->only('email','password');
        
        // if( Auth::guard('web')->attempt($creds)){
        //     return redirect()->route('user.dashboard');
        // }else{
        //     return redirect()->route('user.userLogin')->with('fail','Incorrect credentials');
        // }

    }
    
    function blocked($id){
         $getStatus = User::select('status')->where('id',$id)->first();
       if($getStatus->status==1){
            $status = 0;

       }else{
            $status = 1;
       }
       User::where('id',$id)->update(['status'=>$status]);
       return redirect()->back()->with('success','Status changed successfully!');
    }

    function addadmin(Request $request){

           $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'pnumber'=>'required|min:10',
              'address' => 'required',
              'role' => 'required',
              'password'=>'required|min:4|max:30',
              'cpassword'=>'required|min:4|max:30|same:password'
          ]);

        User::create($request->all());

        return redirect()->back()->with('success','Admin created successfully!');

       
    }

   function showdetails(){
        $users = User::where('role', '=', 'organization')->get();

        return view('user.userdetails',compact('users'))
                ->with('i');
                
    }


     function updatedetails(Request $request){
          $user = new User();
          $user = User::find($request->id);
          $user->name = $request->name;
          $user->pnumber = $request->pnumber;
          $user->address = $request->address;
          $user->role = $request->role;
          $save = $user->update();   
          return redirect()->back()->with('success','Details updated successfully!'); 
    }


    
    function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.userLogin');
    }
}
