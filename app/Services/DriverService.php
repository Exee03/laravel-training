<?php

namespace App\Services;

use App\Models\Driver;

class DriverService
{

    public function getById($id)
    {
        return  Driver::with([
            'user',
            'car',
            'profile',
            'maintenaces',
            'car_models',
        ])
            ->findOrFail($id);
    }

    public function getAll()
    {
        return  Driver::with([
            // 'users',
            // 'cars',
            // 'profiles',
        ])->get();
    }
}
