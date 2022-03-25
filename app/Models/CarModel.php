<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Maintenance;
use App\Models\User;
use App\Models\Driver;

class CarModel extends Model
{
    use  HasFactory;

    protected $table = "car_models";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'brand' => 'string',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'model_id', 'id');
    }

    public function maintenances()
    {
        return $this->hasManyThrough(Maintenance::class, Car::class, 'model_id', 'car_id', 'id', 'id');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Car::class, 'model_id', 'id', 'id', 'user_id');
    }

    public function drivers()
    {
        return $this->hasManyThrough(Driver::class, Car::class, 'model_id', 'car_id', 'id', 'id');
    }
}
