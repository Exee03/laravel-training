<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Driver;
use App\Models\Car;

class Profile extends Model
{
    use  HasFactory;

    protected $table = "profiles";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'full_address' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function drivers()
    {
        return $this->hasManyThrough(Driver::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    public function cars()
    {
        return $this->hasManyThrough(Car::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }
}
