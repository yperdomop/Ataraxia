<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_frequency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registred'
    ];

    //uno a muchos
    public function memberships()
    {
        return $this->hasMany(Membership_price::class);
    }
}
