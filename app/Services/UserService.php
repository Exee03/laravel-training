<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    public function getById($id)
    {
        $plate_no = '333';

        return  User::with([
            // 'profile',
            'cars',
            // 'car' => function($query) use ($plate_no) {
            //     $query->with('model')
            //     ->where('no_plate',$plate_no);
            // },
            // 'drivers',
            'maintenances',
            'car_models'
        ])
            ->findOrFail($id)
            ->append('is_verified');
    }

    public function getAll()
    {
        return  User::get()->each->append('is_verified');
    }

    public function getTake($limit)
    {
        $user = User::take($limit);

        return  $user->get()->each->append('is_verified');
    }
}
