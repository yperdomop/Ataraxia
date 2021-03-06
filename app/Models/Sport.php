<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registred'
    ];

    public function companies()
    {
        return $this->hasMany(Company_datum::class);
    }
}
