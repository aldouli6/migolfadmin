<?php

namespace App\Http\Requests\API;

use App\Models\BetStableford;
use InfyOm\Generator\Request\APIRequest;

class UpdateBetStablefordAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = BetStableford::$rules;
        
        return $rules;
    }
}
