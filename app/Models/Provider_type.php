<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'registred'

    ];

    //uno a muchos
    public function companies()
    {
        return $this->HasMany(Company_datum::class);
    }

    //muchos a muchos
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
