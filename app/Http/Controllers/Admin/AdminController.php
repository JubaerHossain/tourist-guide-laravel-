<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Customer;
use App\Guide;
use App\User;
use App\Balance;
class AdminController extends Controller
{
    function __construct(){
    	$this->middleware('admin');
    }
    function dashboard(){
    	return view('admin.home');
    }

    //role
    function role(){        
    	return view('admin.role');
    }
    function add_role(Request $res){ 
    	$this->validate($res,[
            'name'           =>'required|string',
           ]);
         
         $role=new Role; 
         $role->name=$res->name;
         $role->slug = str_slug($res->name);
         $role->save(); 
         Toastr::success('Role added!', 'Success');
        return redirect()->back();
    }

    function role_delete($id){
      Role::find($id)->delete();
      Toastr::success('Role delete!', 'Success');
      return redirect()->back();
    }
    function role_update(Request $res){
        $this->validate($res,[
            'name'           =>'required|string',
           ]);
         
         $role=Role::find($res->id); 
         $role->name=$res->name;
         $role->slug = str_slug($res->name);
         $role->save(); 
         Toastr::success('Role updated!', 'Success');
        return redirect()->back();
    }
    function find_role(Request $res){
        $role=Role::find($res->id);
        return response()->json($role, 200);
    }


    //guide

    function guide(){
      $guide=Guide::latest()->get();
      return view('admin.guide.guide',compact('guide'));
    }
    function unverified_guide(){
      $guide=Guide::latest()->get();
      return view('admin.guide.unverified_guide',compact('guide'));
    }
    function guide_view($id){
      $guide=Guide::find($id);
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
      return view('admin.guide.guide_single',compact('guide','total'));
    }
    function guide_approve($id){
      $guide = Guide::find($id);   
      if($guide->verified_at){
          $guide->verified_at = 0;
          $msg = 'Guide disable Successfully !';
      }else{
          $guide->verified_at = 1;
          $msg = 'Guide approved Successfully !';
      }
      $guide->save();
      Toastr::success($msg, 'Success');
      return redirect()->back();
    }

    function guide_delete($id){
      $user=User::find($id);
      $user->account->delete(); 
      $user->guide->delete();      
      $user->balance->delete();      
      $user->user_role->delete();      
      $user->delete();
      Toastr::success('Guide delete', 'Success');
      return redirect()->back();
    }

    //customer
    function customer(){
      $customer=Customer::latest()->get();
      
      return view('admin.customer.customer',compact('customer'));
    }
    function unverified_customer(){
      $customer=Customer::latest()->get();
      return view('admin.customer.unverified_customer',compact('customer'));
    }
    function customer_delete($id){
      $user=User::find($id);
      $user->account->delete(); 
      $user->customer->delete();      
      $user->balance->delete();      
      $user->user_role->delete();      
      $user->delete();
      Toastr::success('Unverified customer delete', 'Success');
      return redirect()->back();
    }

    function customer_approve($id){
      $user = User::find($id); 
      $customer=$user->customer;  
      $account=$user->account;
      $balance=new Balance;
      $balance->user_id=$id;  
      $balance->account_id=$account->id;  
      $balance->balance=10;
      $balance->save();
      $account->total_balance=$account->total_balance + 10;
      $account->save();
      if($customer->verified_at){
          $customer->verified_at = 0;
          $msg = 'Customer disable Successfully !';
      }else{
          $customer->verified_at = 1;
          $msg = 'Customer approved Successfully !';
      }
      $customer->save();
      Toastr::success($msg, 'Success');
      return redirect()->back();
    }

    function customer_view($id){
      $customer=Customer::find($id);
        if ( ! $customer) {
          return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($customer->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;
        foreach ($customer->toArray() as $key => $value) {
          if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
            $total += $per_column;
          }
        }
      return view('admin.customer.customer_single',compact('customer','total'));
    }

}
