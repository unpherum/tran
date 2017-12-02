<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shipment;

class Parcel extends Model
{
    protected $fillable = [
            
            'shipments_id',
            'parcel',
            'label_encoded',
            'custom_label_text',
            'parcelnumber',
            'barcode',
            'referencenumber'
            
      ];
      protected $hidden = [
            'token'
      ];

      public function shipment()
      {
            return $this->belongsTo(Shipment::class);
      }
}
