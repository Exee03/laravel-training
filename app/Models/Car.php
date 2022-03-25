<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CarModel;
use App\Models\Maintenance;
use App\Models\Driver;
use App\Models\Profile;

class Car extends Model
{
    use  HasFactory;

    protected $table = "cars";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'model_id',
        'no_plate',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'model_id' => 'integer',
        'no_plate' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'car_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class, 'car_id', 'id');
    }

    public function profile()
    {
        return $this->hasOneThrough(Profile::class, User::class, 'id', 'user_id', 'user_id','id');
    }
}
