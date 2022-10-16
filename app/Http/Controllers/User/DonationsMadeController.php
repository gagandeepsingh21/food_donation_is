<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PostDonationController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationsMadeController extends Controller
{
    function mdonation(Request $request){
       

          $dmade = new Post();
          

          $dmade->foodtype = $request->input('foodtype');
          $dmade->qmeals = $request->input('qmeals');
          $dmade->message = $request->input('message');
          $dmade->pnum = $request->input('pnum');
          $dmade->address = $request->input('address');
          $dmade->date = $request->input('date');
          $dmade -> user_id = Auth::user()->id;
          
          $dmade -> donations_id =$request->input('id');

          $dmade->save();
        return redirect()->back()->with('Donated successfully!');
    }

    function getdetails($id){
        $donate = Donation::find($id);
        return view('user/makedonation',compact('donate'));
    }
}
