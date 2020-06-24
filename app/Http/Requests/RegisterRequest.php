<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // public function rules()
    // {
    //     return [
    //         'name' => ['required', 'string', 'max:255'],
    //         'surname' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'phone' => ['required', 'string',  'max:15', 'unique:users'],
    //         'birth_date'    => ['required', 'date'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ];
    // }
}
