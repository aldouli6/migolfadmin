<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class CountryStateAPIController extends AppBaseController
{
    public function countries(Request $request){
        $input = $request->all();
        $countries = Country::all('id', 'name','code', 'enabled');
        if(isset($input['enabled']))
            $countries = $countries->where('enabled',$input['enabled']);
        return $this->sendResponse(
            $countries->toArray(),
            __('messages.retrieved', ['model' => __('models/countries.plural')])
        );
    }
    public function states(Request $request , $id){
        $input = $request->all();
        $states = State::select('id', 'name','code', 'enabled')->where('country_id',$id)->get();
        if(isset($input['enabled']))
            $states = $states->where('enabled',$input['enabled']);
        return $this->sendResponse(
            $states->toArray(),
            __('messages.retrieved', ['model' => __('models/states.plural')])
        );
    }
}
