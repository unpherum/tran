<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequest extends FormRequest
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
        return [
            'user_id'=> 'required',

            'from_country'=> 'required',
            'from_country_prefix'=> 'required',
            'from_company'=> 'required',
            'from_address'=> 'required',
            'from_zipcode'=> 'required',
            'from_city'=> 'required',

            'to_country'=> 'required',
            'to_country_prefix'=> 'required',
            'to_company'=> 'required',
            'to_address'=> 'required',
            'to_zipcode'=> 'required',
            'to_city'=> 'required',

            'first_name'=> 'required',
            'last_name'=> 'required',
            'telephone'=> 'required',
            'email'=> 'required',
            
            //parcel
            'transporter'=>'required',
            'parcels'=> 'required',
            'price'=> 'required',
            'shippingdate'=>'required',
            
        ];
    }
}
