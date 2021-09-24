<?php

namespace App\Http\Requests\API;

use App\Models\User;
use InfyOm\Generator\Request\APIRequest;
use Illuminate\Validation\Rule;
class UpdateUserAPIRequest extends APIRequest
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
        $rules = [
            'phone' => ['required', 'string', 'max:500',Rule::unique('users', 'phone')->ignore($this->user)],
            'email' => ['required', 'string', 'max:500',Rule::unique('users', 'email')->ignore($this->user)],
            'alias' => ['required', 'string', 'max:500',Rule::unique('users', 'alias')->ignore($this->user)],
        ];
        
        return $rules;
    }
}
