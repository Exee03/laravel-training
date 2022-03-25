<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Maintenance;
use App\Models\CarModel;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
    ];

    // will append to all request
    // protected $appends = [
    //     "is_verified"
    // ];

    public function getIsVerifiedAttribute()
    {
        return !empty($this->email_verified_at);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'user_id', 'id');
    }

    public function car()
    {
        return $this->hasOne(Car::class, 'user_id', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'user_id', 'id');
    }

    public function maintenances()
    {
        // table 1  -> table 2 -> table 3
        // hasManyThrough( [table 3] , [table 2] , [name param from 2 to 1 table], [name param from 3 to 2 table] , [name param from 1 to 2 table] , [name params from 2 to 3 table] )
        return $this->hasManyThrough(Maintenance::class, Car::class, 'user_id', 'car_id', 'id', 'id');
    }

    public function car_models()
    {
        return $this->hasManyThrough(CarModel::class, Car::class, 'user_id', 'id', 'id', 'model_id');
    }
}
