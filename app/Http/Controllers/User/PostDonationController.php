<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class PostDonationController extends Controller
{
    function upload(Request $request){
        $donation = new Donation();
        $donation -> dtitle = $request->input('dtitle');
        $donation -> dquantity = $request->input('dquantity');
        $donation -> pnumber = $request->input('pnumber');
        $donation -> location = $request->input('address');
        $donation -> date = $request->input('dondate');
        $donation -> user_id = Auth::user()->id;
        if($request->hasfile('pimage')){
            $file= $request->file('pimage');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            $donation->image = $filename;

        }
        $donation->save();
        return redirect()->back()->with('Donation post cretead successfully!');

        
    }
     function approve(){

        $donations = Donation::where('isset', '=', '0')->get();

        return view('user.unverifiedposts',compact('donations'))
                ->with('i');
                
    }
    function unverified(){
        $user = Auth::user();
        // return $user;
        $dons = Donation::where([
        ['user_id', '=', Auth::user()->id],
        ['isset', '=', 0]
        ])->orderBy('id','asc')->get();
         return view('user.unapprovedposts',compact('user','dons'))
                ->with('i');

    }
}
