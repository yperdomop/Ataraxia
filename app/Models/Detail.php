<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [

        'service_type',
        'Property_name',
        'price',
        'location',
        'description',
        'transport type',
        'quotation_id',

    ];
}
