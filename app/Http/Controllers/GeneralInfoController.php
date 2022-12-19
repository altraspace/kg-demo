<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralInfoController extends Controller
{
    public function states(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator, 5006);
        }

        $states = State::where('country_id', $request->country_id)->select('id', 'name')->get();

        $data = [];
        $data['states'] = $states;
        
        return $this->successResponse($data, null, 5004);
    }

    public function cities(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'state_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator, 5006);
        }

        $cities = City::where('state_id', $request->state_id)->select('id', 'name')->get();

        $data['cities'] = $cities;
        return $this->successResponse($data);
    }
}
