<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Parcel;

class Shipment extends Model
{
      protected $fillable = [

            'user_id',

            'from_country',
            'from_country_prefix',
            'from_company',
            'from_zipcode',
            'from_city',
            'from_address',

            'to_country',
            'to_country_prefix',
            'to_company',
            'to_zipcode',
            'to_city',
            'to_address',

            'first_name',
            'last_name',
            'telephone',
            'email',
            
            'shippingdate',
            'transporter',
            'price'
            
      ];
      protected $hidden = [
            'token'
      ];

      public function user()
      {
            return $this->belongsTo(User::class);
      }

      public function parcels()
      {
            return $this->hasMany(Parcel::class);
      }
}
