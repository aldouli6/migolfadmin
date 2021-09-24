<?php

namespace App\Http\Requests\API;

use App\Models\TeeColor;
use InfyOm\Generator\Request\APIRequest;

class UpdateTeeColorAPIRequest extends APIRequest
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
        $rules = TeeColor::$rules;
        
        return $rules;
    }
}
