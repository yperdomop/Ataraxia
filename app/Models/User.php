<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'company_datum_id',
        'first_name',
        'last_name',
        'email',
        'status',
        'username',
        'password',
        'city_id',
        'phone',
        'area_id',
        'scholarship_id',
        'identification_document',
        'birth_date',
        'gender',
        'postal_code',
        'registred'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //uno a muchos inverso
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company_datum::class, 'company_datum_id');
    }

    //uno a muchos polimorfico
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
