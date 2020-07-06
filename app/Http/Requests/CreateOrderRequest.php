<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
          
            'name.required' => 'Name is required',
            'surname.required' => 'Surname is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'phone.max' => 'Max length of phone should be less than 15',
            'country.required' => 'Country is required',
            'city.required' => 'City is required',
            'address.required' => 'Address is required'


        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
            return [
                'name' => [ 'string', 'max:255'],
                'surname' => ['string', 'max:255'],
                'surname' => [ 'string', 'max:255'],
                'email' => [ 'string', 'email', 'max:255'],
                'phone' => [ 'string',  'max:15'],
                'country' => ['required', 'string',  'max:150'],
                'city' => ['required', 'string',  'max:255'],
                'address' => ['required', 'string',  'max:255'],
             
              
            ];
        
    }
}
