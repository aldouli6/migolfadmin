<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
            'alias' => 'required|max:10',
            'phone' => 'required|unique:users',
            'phone_code' => 'required',
            'email' => 'required|email|unique:users',
            'lastname' => 'required',
            'name' => 'required',
        ];
        
        return $rules;
    }
}
