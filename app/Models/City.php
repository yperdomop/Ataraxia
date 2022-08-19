<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registred',
        'country_id',
        'state_id',
        'department_id',
    ];

    //uno a muchos
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function companies()
    {
        return $this->hasMany(Company_datum::class);
    }

    //uno a muchos inverso
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
