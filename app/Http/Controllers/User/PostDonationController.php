<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class PostDonationController extends Controller
{
    function upload(Request $request){
        $donation = new Donation();
        $donation -> dtitle = $request->input('dtitle');
        $donation -> dquantity = $request->input('dquantity');
        $donation -> pnumber = $request->input('pnumber');
        $donation -> location = $request->input('address');
        $donation -> date = $request->input('dondate');
        if($request->hasfile('pimage')){
            $file= $request->file('pimage');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            $donation->image = $filename;

        }
        $donation->save();
        return redirect()->back()->with('Student image added successfully!');

        
    }
     function approve(){

        $donations = Donation::where('isset', '=', '0')->get();

        return view('user.unverifiedposts',compact('donations'))
                ->with('i');
                
    }
}
