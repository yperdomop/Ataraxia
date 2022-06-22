<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_datum extends Model
{
    use HasFactory;

    protected $dates = [
        'purchase_date',
        'expiration_date'
    ];

    protected $fillable = [
        'company_datum_id',
        'price',
        'payment_frequency_id',
        'purchase_date',
        'expiration_date',
        'registred'
    ];

    //uno a muchos inverso
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment_frequency::class);
    }
}
