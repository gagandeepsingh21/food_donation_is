<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Post;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostDonationController extends Controller
{
    function upload(Request $request){
        $donation = new Donation();
        $donation -> dtitle = $request->input('dtitle');
        $donation -> dquantity = $request->input('dquantity');
        $donation -> description = $request->input('description');
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
        return redirect()->back()->with('success','Donation post cretead successfully!');

        
    }
     function approve(){

        $donations = Donation::where('isset', '=', 0)->get();

        return view('user.unverifiedposts',compact('donations'))
                ->with('i');
                
    }
    //view approved and unapproved posts posted by a particular organization
    function unverified(){
        $user = Auth::user();
        $dons = Donation::where([
        ['user_id', '=', Auth::user()->id],
        ['isset', '=', 0]
        ])->orderBy('id','asc')->get();
         return view('user.unapprovedposts',compact('user','dons'))
                ->with('i');

    }

    function apporovedposts(){
        $user = Auth::user();
        $dons = Donation::where([
        ['user_id', '=', Auth::user()->id],
        ['isset', '=', 1]
        ])->orderBy('id','asc')->get();
         return view('user.approvedposts',compact('user','dons'))
                ->with('i');
    }
    
    //view approved posts for donors
    function vposts(){
        // $uid = Auth::user();
        // $did = Donation::where(['user_id','=',Auth::user->id,'dquantity']);
        // $pid = Post::where([['user_id','=',Auth::user->id],
        // ['donation_id','=',Donation::find($id),'qmeals']
        // ]);
        // $total = $did - $pid;
    

         $dons = DB::table('posts')
                ->select('posts.*','donations.dquantity as dquantity','posts.qmeals as qmeals','users.name','users.role')
                ->select(DB::raw('SUM(qmeals)'))
                
                
                ->leftJoin('donations','donations.id','posts.donations_id')
                ->leftJoin('users','users.id','posts.user_id')      
                ->get();
                 $dons = Donation::where('isset', '=', 1)->get();
    
        return view('user.vdonationposts',compact('dons'))
                ->with('i');

    }
    
    
    //view approved posts for admins
     function approveddetails(){
        $donations = Donation::where('isset', '=', 1)->get();

        return view('user.verifiedpost',compact('donations'))
                ->with('i');
    }


    //change status
    function changestatus($id){
       $getStatus = Donation::select('isset')->where('id',$id)->first();
       if($getStatus->isset==0){
            $status = 1;

       }else{
            $status = 0;
       }
       Donation::where('id',$id)->update(['isset'=>$status]);
       return redirect()->back()->with('Status changed successfully!');
    }


    function disapprove($id){
       $getStatus = Donation::select('isset')->where('id',$id)->first();
       if($getStatus->isset==1){
            $status = 0;

       }else{
            $status = 1;
       }
       Donation::where('id',$id)->update(['isset'=>$status]);
       return redirect()->back()->with('success','Status changed successfully!');
    }
    
    //view on a separate page on admin side
    function vverifiedpost($id){
        $donposts = Donation::find($id);
        return view('user.vverifiedpost', compact('donposts'));
    }
    function vunverifiedpost($id){
        $donposts = Donation::find($id);
        return view('user.vunverifiedposts', compact('donposts'));
    }

    //view on a separate page on organization side
    function vapprovedpost($id){
        $donp = Donation::find($id);
        return view('user.vapprovedpost', compact('donp'));
        
    }
    function vdisapprovedpost($id){
        $donp = Donation::find($id);
        return view('user.vdisapprovedpost', compact('donp'));
    }

    //view on a separate for the donor

    function vapost($id){
         $adons = Donation::find($id);
        return view('user.vapost', compact('adons'));
    }

    //delete a post from the approved and disapproved organization posts
    function deleteapprpost($id){
        $post = Donation::find($id);
        $post->delete();
       return redirect()->route('user.approvedposts')->with('success','Post deleted successfully!');

    }

    //updating the post details
    function upost($id){
        $upost = Donation::find($id);
        return view('user.paedit',compact('upost'));

    }
    
    function updatepost(Request $request, $id){
        $donation = new Donation();
        $donation = Donation::find($id);
        $donation -> dtitle = $request->input('dtitle');
        $donation -> dquantity = $request->input('dquantity');
        $donation -> description = $request->input('description');
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
        $donation->update();
        return redirect('user/approvedposts')->with('success','Donation post updated successfully!');

        
    }

    function deactivate($id){
       $getStatus = Donation::select('isset')->where('id',$id)->first();
       if($getStatus->isset==1){
            $status = 0;

       }else{
            $status = 1;
       }
       Donation::where('id',$id)->update(['isset'=>$status]);
       return redirect()->back()->with('success','Status changed successfully!');
   }

   //blog post
   function cblog(Request $request){
       

          $blog = new Blog();
          

          $blog->bname = $request->input('bname');
          $blog->date = $request->input('bdate');
          $blog->about = $request->input('about');

          $blog->save();
          return redirect()->back()->with('success','You have successfully created the blog post!');
    }
    function vblog(){
        $vblogs = DB::select('select * from blogs');
        return view('user.vblog',compact('vblogs'));

    }
   
    
}
