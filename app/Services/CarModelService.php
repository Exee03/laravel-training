<?php

namespace App\Services;

use App\Models\CarModel;

class CarModelService
{

    public function getById($id)
    {
        return  CarModel::with([
            'cars',
            'maintenances',
            'users',
            'drivers',
        ])
            ->findOrFail($id);
    }

    public function getAll()
    {
        return  CarModel::with([
            'cars',
            'maintenances',
            'users',
            'drivers',
        ])->get();
    }
}
