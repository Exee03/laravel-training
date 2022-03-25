<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{

    public function getById($id)
    {
        return  Profile::with([
            'user',
            'drivers',
            'cars',
        ])
            ->findOrFail($id);
    }

    public function getAll()
    {
        return  Profile::with([
            'user',
            'drivers',
            'cars',
        ])->get();
    }
}
