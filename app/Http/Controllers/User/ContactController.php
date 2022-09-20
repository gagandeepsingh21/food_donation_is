<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function send(Request $request){
         $request->validate([
        'name'=>'required',
        'email'=> 'required|email',
        'address'=>'required',
        'pnumber'=>'required',
        'about'=>'required'
    ]);
    if($this->isOnline()){
        $mail_data = [
            'recipient'=> 'fooddonation21@gmail.com',
            'fromEmail'=>$request->email,
            'fromName'=>$request->name,
            'subject' =>'Regarding Organizations Account Creation',
            'body' => $request->about
        ];
       \Mail::send('email-template', $mail_data, function ($message) use ($mail_data){
            $message->to($mail_data['recipient']);
            $message->from($mail_data['fromEmail'],$mail_data['fromName']);
            $message->subject($mail_data['subject']);

        });
        return redirect()->back()->with('success','Email sent!');
    }else{
        return redirect()->back()->withInput()->with('fail','Email not sent!');
    }
    }


    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
