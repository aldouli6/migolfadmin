<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class CountryStateAPIController extends AppBaseController
{
    public function countries(Request $request){
        $countries = Country::all('id', 'name','code');
        return $this->sendResponse(
            $countries->toArray(),
            __('messages.retrieved', ['model' => __('models/countries.plural')])
        );
    }
    public function states($id){
        $states = State::select('id', 'name','code')->where('country_id',$id)->get();
        return $this->sendResponse(
            $states->toArray(),
            __('messages.retrieved', ['model' => __('models/states.plural')])
        );
    }
}
