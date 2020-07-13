<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UpdateUsersProfileRequest extends FormRequest
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


    public function messages()
    {
        return [
          
            'name.required'     => 'Name is required',
            'surname.required'  => 'Surname is required',
            'email.required'    => 'Email is required',
            'phone.required'    => 'Phone is required',
            'phone.max'         => 'Max length of phone should be less than 15'
         


        ];
    }



    /**
     * Get the validation rules that apply to the request.
     *gigit
     * @return array
     * 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function rules()
    {
        $user = Auth::user();
        return [
            'name'      => ['required', 'string', 'max:255'],
            'surname'   => ['required', 'string', 'max:255'],
            'surname'   => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'phone'     => ['required', 'string', 'max:15', Rule::unique('users')->ignore($user)]
            //'phone'     => ['required', 'string', 'max:15', 'unique:users']
           // 'phone'     => ['required', 'string', 'max:15', Rule::unique('users')->ignore((request()->route()->parameter('user')->id))]
         
          
        ];
    }
}
