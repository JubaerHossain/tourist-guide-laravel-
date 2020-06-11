<?php

namespace App\Http\Controllers\guide;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Auth;
use Image;
use App\Guide;
use App\GuideDetail;
use App\Account;
use App\GuidePost;
use App\GuideVideo;
class GuideController extends Controller
{
    public function guide_dashboard(){
        $guide=Guide::where('user_id', Auth::user()->id)->first();
        if ( ! $guide) {
          return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($guide->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;
        foreach ($guide->toArray() as $key => $value) {
          if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
            $total += $per_column;
          }
        }
        $income=Auth::user()->account;
        return view('frontend.guide.dashboard',compact('income','total'));
    }
    public function profile_update(Request $request){
        $this->validate($request,[
            'location'       =>'sometimes|nullable|string',
            'language'       =>'sometimes|nullable|string',
            'name'           =>'sometimes|nullable|string',
            'country'           =>'sometimes|nullable|string',
            'state'           =>'sometimes|nullable|string',
            'rate'           =>'sometimes|nullable|integer',
            'profile_pic'    =>'image|mimes:jpg,png,jpeg|max:5000',
            'back_pic'       =>'image|mimes:jpg,png,jpeg|max:5000',
           ]);
           $user = Auth::user();
           $user->name = $request->name;
           $user->save();
           $profile = Auth::user()->guide; 
           $profile->location=$request->location;
           $profile->language=$request->language;
           $profile->rate=$request->rate;
           $profile->country=$request->country;
           $profile->state=$request->state;
           $profile->save(); 
           if($request->hasFile('profile_pic')){
            $file = $request->file('profile_pic');
        
            $images = Image::canvas(300, 300, '#fff');
            $image  = Image::make($file);
            $images->insert($image, 'center');
            $pathImage = 'guide/profile/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/profile/'.$name);
                $profile->profile_pic =  $name;
            }else{
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
                File::delete('guide/profile/'.$profile->profile_pic);
                $images->save('guide/profile/'.$name);
                $profile->profile_pic =  $name;
            }
            $profile->save();
          } 
           if($request->hasFile('back_pic')){
            $file = $request->file('back_pic');        
            $images = Image::make($file)->resize(700, 400)->insert($file,'center');
            $pathImage = 'guide/profile/cover/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/profile/cover/'.$name);
                $profile->back_pic =  $name;
            }else{
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
                File::delete('guide/profile/cover/'.$profile->back_pic);
                $images->save('guide/profile/cover/'.$name);
                $profile->back_pic =  $name;
            }
            $profile->save();
          } 

           if($request->hasFile('nid')){
            $file = $request->file('nid');
            $images = Image::make($file)->insert($file);
            $pathImage = 'guide/Nid/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/Nid/'.$name);
                $profile->nid =  $name;
            }else{
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
                File::delete('guide/Nid/'.$profile->nid);
                $images->save('guide/Nid/'.$name);
                $profile->nid =  $name;
            }
            $profile->save();
          } 
           if($request->hasFile('bc')){
            $file = $request->file('bc');
            $images = Image::make($file)->insert($file);
            $pathImage = 'guide/BC/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/BC/'.$name);
                $profile->bc =  $name;
            }else{
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
                File::delete('guide/BC/'.$profile->bc);
                $images->save('guide/BC/'.$name);
                $profile->bc =  $name;
            }
            $profile->save();
          } 
           if($request->hasFile('pid')){
            $file = $request->file('pid');
            $images = Image::make($file)->insert($file);
            $pathImage = 'guide/PID/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/PID/'.$name);
                $profile->pid =  $name;
            }else{
                $name =Auth::user()->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
                File::delete('guide/PID/'.$profile->pid);
                $images->save('guide/PID/'.$name);
                $profile->pid =  $name;
            }
            $profile->save();
          } 
            Toastr::success('Profile update!', 'Success');
            return redirect()->back();
  }

      function earning(){
        $guide=Guide::where('user_id', Auth::user()->id)->first();
        if ( ! $guide) {
          return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($guide->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;
        foreach ($guide->toArray() as $key => $value) {
          if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
            $total += $per_column;
          }
        }
        $income=Auth::user()->account;
          return view('frontend.guide.income',compact('income','total'));
      } 
      function details(){
        $guide=Guide::where('user_id', Auth::user()->id)->first();
        if ( ! $guide) {
          return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($guide->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;
        foreach ($guide->toArray() as $key => $value) {
          if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
            $total += $per_column;
          }
        }
        $income=Auth::user()->account;
          return view('frontend.guide.details.index',compact('income','total'));
      } 
      function detals_add(Request $request){
        $this->validate($request,[
            'title'       =>'required|string|unique:guide_details',
           ]);
           $guide =new GuideDetail;
           $guide->guide_id = Auth::user()->guide->id;
           $guide->title = $request->title;
           $guide->save();
           Toastr::success('Passions added!', 'Success');
            return redirect()->back();
       }
       function detals_update(Request $request,$id){
        $this->validate($request,[
            'title'       =>'required|string|unique:guide_details',
           ]);
           $guide =GuideDetail::find($id);
           $guide->guide_id = Auth::user()->guide->id;
           $guide->title = $request->title;
           $guide->save();
           Toastr::success('Passions update!', 'Success');
            return redirect()->back();
       }
       function detals_delete($id){
        GuideDetail::find($id)->delete();
        Toastr::success('Passions deleted!', 'Success');
            return redirect()->back();
       }


      
       function edit_profile(){
        $guide=Guide::where('user_id', Auth::user()->id)->first();
        if ( ! $guide) {
          return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($guide->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;
        foreach ($guide->toArray() as $key => $value) {
          if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
            $total += $per_column;
          }
        }
        $income=Auth::user()->account;
           return view('frontend.guide.edit_profile',compact('income','total'));
       }

       //place
        //place 
        function place(){
          $guide=Guide::where('user_id', Auth::user()->id)->first();
          if ( ! $guide) {
            return 0;
          }
          $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($guide->toArray()), PREG_GREP_INVERT);
          $per_column = 100 / count($columns);
          $total      = 0;
          foreach ($guide->toArray() as $key => $value) {
            if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
              $total += $per_column;
            }
          }
          $income=Auth::user()->account;
             return view('frontend.guide.place.index',compact('income','total'));
         }

        function add_place(Request $request){
          $this->validate($request,[
            'title'       =>'required|string',
            'name'           =>'required|string',
            'rate'           =>'required|integer',
            'image'    =>'required|image|mimes:jpg,png,jpeg|max:5000',
           ]);
           $place =new GuidePost; 
           $place->user_id=Auth::user()->id;
           $place->guide_id=Auth::user()->guide->id;
           $place->title=$request->title;
           $place->name=$request->name;
           $place->rate=$request->rate;
           $place->save(); 
           if($request->hasFile('image')){
            $file = $request->file('image');
            $images = Image::make($file)->insert($file);
            $pathImage = 'guide/place/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =$request->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/place/'.$name);
                $place->image =  $name;
            }else{
                $name =$request->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
               
                $images->save('guide/place/'.$name);
                $place->image =  $name;
            }
            $place->save();
          
        }
        Toastr::success('Place added!', 'Success');
        return redirect()->back();

      }
        function update_place(Request $request,$id){
          $this->validate($request,[
            'title'       =>'required|string',
            'name'           =>'required|string',
            'rate'           =>'required|integer',
            'image'    =>'required|image|mimes:jpg,png,jpeg|max:5000',
           ]);
           $place =GuidePost::find($id); 
           $place->user_id=Auth::user()->id;
           $place->guide_id=Auth::user()->guide->id;
           $place->title=$request->title;
           $place->name=$request->name;
           $place->rate=$request->rate;
           $place->save(); 
           if($request->hasFile('image')){
            $file = $request->file('image');
            $images = Image::make($file)->insert($file);
            $pathImage = 'guide/place/';                                                   
            if (!file_exists($pathImage)){
                mkdir($pathImage, 0777, true);
                $name =$request->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
                $images->save('guide/place/'.$name);
                $place->image =  $name;
            }else{
                $name =$request->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();   
                File::delete('guide/place/'.$place->image);
                $images->save('guide/place/'.$name);
                $place->image =  $name;
            }
            $place->save();
          
        }
        Toastr::success('Place update!', 'Success');
        return redirect()->back();

      }
      function place_delete($id){
        $place =GuidePost::find($id);
        File::delete('guide/place/'.$place->image);
        $place->delete();
        Toastr::success('Place delete!', 'Success');
        return redirect()->back();
        
      }

      //introduce_profile
      function introduce(){        
        return view('frontend.guide.introduce.index');
      }
      function add_introduce_profile(Request $request){
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,[
          'title'       =>'required|string',
          "link"        => "sometimes|nullable|regex:".$regex,
          'image'       =>'sometimes|nullable|image|mimes:jpg,png,jpeg|max:5000',
         ]);
         $intr =new GuideVideo; 
         $intr->guide_id=Auth::user()->guide->id;
         $intr->title=$request->title;
         $intr->guide_video=$request->link;
         $intr->save(); 
         if($request->hasFile('image')){
          $file = $request->file('image');
          $images = Image::make($file)->insert($file);
          $pathImage = 'guide/introduce/';                                                   
          if (!file_exists($pathImage)){
              mkdir($pathImage, 0777, true);
              $name =Auth::user()->guide->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
              $images->save('guide/introduce/'.$name);
              $intr->image =  $name;
          }else{
              $name =Auth::user()->guide->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                
              $images->save('guide/introduce/'.$name);
              $intr->image =  $name;
          }
          $intr->save();
      }
      Toastr::success('Inroduce added!', 'Success');
        return redirect()->back();
    }
      function edit_introduce_profile(Request $request,$id){
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,[
          'title'       =>'required|string',
          "link"        => "sometimes|nullable|regex:".$regex,
          'image'       =>'sometimes|nullable|image|mimes:jpg,png,jpeg|max:5000',
         ]);
         $intr =GuideVideo::find($id); 
         $intr->guide_id=Auth::user()->guide->id;
         $intr->title=$request->title;
         $intr->guide_video=$request->link;
         $intr->save(); 
         if($request->hasFile('image')){
          $file = $request->file('image');
          $images = Image::make($file)->insert($file);
          $pathImage = 'guide/introduce/';                                                   
          if (!file_exists($pathImage)){
              mkdir($pathImage, 0777, true);
              $name =Auth::user()->guide->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();                    
              $images->save('guide/introduce/'.$name);
              $intr->image =  $name;
          }else{
              $name =Auth::user()->guide->name.'-'.time() .'-'.uniqid().'.'.$file->getClientOriginalExtension();
              File::delete('guide/introduce/'.$intr->image);                 
              $images->save('guide/introduce/'.$name);
              $intr->image =  $name;
          }
          $intr->save();
      }
      Toastr::success('Inroduce update!', 'Success');
        return redirect()->back();
    }
    function delete_introduce_profile($id){
      $introduce =GuideVideo::find($id);
      File::delete('guide/introduce/'.$introduce->image);
      $introduce->delete();
      Toastr::success('Introduce delete!', 'Success');
      return redirect()->back();
      
    }
}
