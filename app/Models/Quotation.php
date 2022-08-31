<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'date',
        'route',
        'company_datum_id',
        'event_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company_datum::class, 'company_datum_id');
    }
}
