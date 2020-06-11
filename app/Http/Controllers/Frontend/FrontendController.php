<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Guide;
use App\User;
class FrontendController extends Controller
{
    public function index(){
        $guide=Guide::where('verified_at',1)->take(8)->get();
        return view('frontend.home.index',compact('guide'));
    }
    public function hotel(){
        return view('frontend.hotel.index');
    }
    public function single_hotel(){
        return view('frontend.hotel.single');
    }
    public function restaurants(){
        return view('frontend.restaurant.index');
    }
    public function single_restaurant(){
        return view('frontend.restaurant.single');
    }
    public function tourist_guide(){
        return view('frontend.guide.index');
    }
    public function local_guide($id){
        $user=User::findOrFail($id);
        return view('frontend.guide.profile',compact('user'));
    }
    function guide_search(Request $request){
         $guide=Guide::where('verified_at',1)->select('name','country','state','profile_pic','back_pic','location','rate','language','nid','pid','bc')->orderBy('id','asc');
         
         if ($request->location != null) { 
			$guide->where('location', 'like', '%'.$request->location.'%');
		}
		if ($request->state !=  null) {			
			$guide->where('state', 'like', '%'.$request->state.'%');
		}		
        $guide=$guide->get();
        return view('frontend.guide.guidelist',compact('guide'));
    }
    
   
}
