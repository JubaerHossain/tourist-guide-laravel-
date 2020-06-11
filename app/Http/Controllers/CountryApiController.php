<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
class CountryApiController extends Controller
{
    public function state($name)
    {
        $getCountryId = Country::where('name',$name)->first();
        $state = [
            'state' => [State::where('country_id',$getCountryId->id)->pluck('name')]
        ];
        return response()->json($state);
    }
}
