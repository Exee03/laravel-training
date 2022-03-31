<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Profile;
use App\Models\Maintenance;
use App\Models\CarModel;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "drivers";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'car_id',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'car_id' => 'integer',
        'name' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function profile()
    {
        return $this->hasOneThrough(Profile::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    public function maintenaces()
    {
        return $this->hasManyThrough(Maintenance::class, Car::class, 'id', 'car_id', 'car_id', 'id');
    }

    public function car_models()
    {
        return $this->hasManyThrough(CarModel::class, Car::class, 'id', 'id', 'car_id', 'model_id');
    }
}
