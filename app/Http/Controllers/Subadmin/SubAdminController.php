<?php

namespace App\Http\Controllers\Subadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubAdminController extends Controller
{
    function __construct(){
        $this->middleware('subadmin');
      }
     
      public function convert_to_slug($text){
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text);
        // remove duplicated - symbols
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
          return 'n-a';
        }
        return $text;
      }
    public function dashboard(){
      	return view('merchant.home');
    }
}
