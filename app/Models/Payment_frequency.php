<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_frequency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_datum_id',
        'registred'
    ];

    //uno a muchos
    public function purchase()
    {
        return $this->hasMany(Purchase_datum::class);
    }

    //uno a muchos inverso
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
