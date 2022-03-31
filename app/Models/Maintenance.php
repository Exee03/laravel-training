<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Car;

class Maintenance extends Model
{
    use HasFactory, SoftDeletes;

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
        // 'maintenance_at' => 'datetime:d/m/Y', //format date using cast
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    //format date using attribute
    public function getMaintenanceAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
}
