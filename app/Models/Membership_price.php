<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Membership_price extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_frequency_id',
        'role_id',
        'price',
        'registred'
    ];

    //uno a muchos inverso
    public function payment()
    {
        return $this->belongsTo(Payment_frequency::class, 'payment_frequency_id');
    }

    //uno a muchos inverso
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    //uno a muchos
    public function purchases()
    {
        return $this->hasMany(Purchase_datum::class);
    }
}
