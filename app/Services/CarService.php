<?php

namespace App\Services;

use App\Models\Car;

class CarService
{

    public function getById($id)
    {
        return  Car::with([
            'user',
            'model',
            'maintenances',
            'drivers',
            'profile'
        ])
            ->findOrFail($id);
    }

    public function getAll()
    {
        return  Car::with([
            'user',
            'model',
            'maintenances',
            'drivers',
            'profile'
        ])->get();
    }

    public function getTake($limit)
    {
        $user = Car::take($limit);

        return  $user->get();
    }
}
