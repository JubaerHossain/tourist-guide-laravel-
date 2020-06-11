<?php

namespace App\Http\Controllers\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Auth;
use Image;
class CustomerController extends Controller
{
    public function dashboard(){
        return view('frontend.customer.profile');
    }
    public function profile(){
        
        return view('frontend.customer.profile');
    }
   public function profile_update(Request $request){
    $this->validate($request,[
        'location'       =>'sometimes|nullable|string',
        'language'       =>'sometimes|nullable|string',
        'country'           =>'sometimes|nullable|string',
        'state'           =>'sometimes|nullable|string',
        'name'           =>'sometimes|nullable|string',
        'profile_pic'    =>'image|mimes:jpg,png,jpeg|max:5000',
        'back_pic'       =>'image|mimes:jpg,png,jpeg|max:5000',
       ]);
       $user = Auth::user();
       $user->name = $request->name;
       $user->save();
       $profile = Auth::user()->customer; 
       $profile->location=$request->location;
       $profile->country=$request->country;
       $profile->state=$request->state;
       $profile->language=$request->language;
       $profile->save();


       if($request->hasFile('profile_pic')){
        $file = $request->file('profile_pic');
    
        $images = Image::canvas(300, 300, '#fff');
        $image  = Image::make($file);
        $images->insert($image, 'center');
        $pathImage = 'customer/profile/';                                                   
        if (!file_exists($pathImage)){
            mkdir($pathImage, 0777, true);
            $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
            $images->save('customer/profile/'.$name);
            $profile->profile_pic =  $name;
        }else{
            $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
            File::delete('customer/profile/'.$profile->profile_pic);
            $images->save('customer/profile/'.$name);
            $profile->profile_pic =  $name;
        }
        $profile->save();
      } 
       if($request->hasFile('back_pic')){
        $file = $request->file('back_pic');
    
        $images = Image::canvas(700, 400, '#fff');
        $image  = Image::make($file);
        $images->insert($image, 'center');
        $pathImage = 'customer/profile/cover/';                                                   
        if (!file_exists($pathImage)){
            mkdir($pathImage, 0777, true);
            $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
            $images->save('customer/profile/cover/'.$name);
            $profile->back_pic =  $name;
        }else{
            $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
            File::delete('customer/profile/cover/'.$profile->back_pic);
            $images->save('customer/profile/cover/'.$name);
            $profile->back_pic =  $name;
        }
        $profile->save();
      } 
        Toastr::success('Profile update!', 'Success');
        return redirect()->back();
   }
}
