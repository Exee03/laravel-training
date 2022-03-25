<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = "maintenances";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'car_id',
        'mileage',
        'details',
        'maintenance_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'car_id' => 'integer',
        'mileage' => 'string',
        'details' => 'string',
        'maintenance_at' => 'datetime',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
