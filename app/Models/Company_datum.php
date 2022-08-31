<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_datum extends Model
{
    use HasFactory;

    protected $fillable = [
        'bussiness_name',
        'registred',
        'language',
        'postal_code',
        'legal_representative',
        'legal_representative_document',
        'nit',
        'address',
        'phone',
        'city_id',
        'email',
        'sport_id',
        'provider_type_id'
    ];

    //uno a muchos
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase_datum::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    //uno a muchos polimorfico
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    //uno a muchos inverso
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function providerType()
    {
        return $this->belongsTo(Provider_type::class);
    }
}
