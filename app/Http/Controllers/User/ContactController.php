<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function send(Request $request){
         $request->validate([
        'orgname'=>'required',
        'email'=> 'required|email',
        'address'=>'required',
        'pnumber'=>'required|min:10',
        'about'=>'required'
    ]);
    
        $mail_data = [
            
            'fromEmail'=>$request->email,
            'fromName'=>$request->orgname,
            'subject' =>'Regarding Organizations Account Creation',
            'body' => $request->about,
            'pnumber' => $request->pnumber,
            'address' => $request->address
        ];
        
       \Mail::send('email-template', $mail_data, function ($message) use ($mail_data){
            $message->to('fooddonation99@gmail.com');
            $message->from($mail_data['fromEmail'],$mail_data['fromEmail']);
            
            $message->subject($mail_data['subject']);
           
        });
        Form::create($request->all());


        return redirect()->back()->with('success','Email sent!');
    }
    
    function showdetails(){
        $forms = Form::all();

        return view('user.viewcontacts',compact('forms'))
                ->with('i');
                
    }
}


    

