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
            // 'user',
            // 'drivers',
            // 'cars',
        ])->get();
    }

    public function storeBulk($input)
    {
        $input = $input->toArray();
        return Profile::insert($input);
    }

    public function create($input)
    {
        $input = $input->toArray();

        return Profile::create($input);
    }

    public function save($input)
    {
        $profile = new Profile;
        $profile->user_id = $input->user_id;
        $profile->full_address = $input->full_address;
        $profile->save();
        return $profile;
    }
}
