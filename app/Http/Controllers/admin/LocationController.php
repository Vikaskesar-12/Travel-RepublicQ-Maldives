<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{

    
    public function getStates($id)
    {
        $states = State::where('country_id', $id)->get();
        return response()->json($states);
    }



    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
}

