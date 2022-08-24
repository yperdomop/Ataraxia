<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_datum_id',
        'date',
        'address',
        'city_from_id',
        'city_to_id',
        'registred',
        'adult_passengers',
        'child_passengers',
        'transport',
        'observation'
    ];

    //uno a muchos inverso
    public function company()
    {
        return $this->belongsTo(Company_datum::class, 'company_datum_id');
    }

    public function city_from()
    {
        return $this->belongsTo(City::class, 'city_from_id');
    }

    public function city_to()
    {
        return $this->belongsTo(City::class, 'city_to_id');
    }

    //muchos a muchos
    public function provider_types()
    {
        return $this->belongsToMany(Provider_type::class);
    }
}
