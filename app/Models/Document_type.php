<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registred',
        'country_id',
        'state_id'
    ];

    //uno a muchos
    public function Companies()
    {
        return $this->hasMany(Company_datum::class);
    }
}
