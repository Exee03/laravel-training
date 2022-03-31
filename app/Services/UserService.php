<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{

    public function getById($id)
    {
        $plate_no = '333';

        return  User::with([
            // 'profile',
            // 'cars',
            // 'car' => function ($query) use ($plate_no) {
            //     $query->with('model')
            //         ->where('no_plate', $plate_no);
            // },
            // 'drivers',
            'maintenances',
            // 'car_models',
            // 'is_verified'
        ])
            ->findOrFail($id)
            // ->load('maintenances')
            ->append('is_verified')
            // ->makeVisible(['profile'])
            // ->makeHidden(['profile'])
            ->customHidden();
    }

    public function getAll()
    {
        $plate_no = '333';
        $brand_name = 'brand 1';

        return  User::with([
            // 'profile',
            // 'cars.model',
            // 'car' => function ($query) use ($plate_no) {
            //     $query->with('model')
            //         // ->where('no_plate', $plate_no)
            //         ;
            // },
            // 'drivers',
            // 'maintenances',
            // 'car_models',
            // 'is_verified'
        ])
            // ->hasBrand($brand_name)
            // ->whereHas('car.model', function ($query) use ($brand_name) {
            //     $query->where('brand', $brand_name);
            // })
            ->get()
            ->each
            ->customHidden()
            // ->append('is_verified')
        ;
    }

    public function getTake($limit)
    {
        $user = User::take($limit);

        return  $user->get()->each->append('is_verified');
    }

    public function verified()
    {
        return User::UserVerified()->get();
    }

    public function storeBulk($input)
    {
        $input = $input->toArray();

        foreach ($input as $index => $value) {
            $input[$index]["password"] = Hash::make($input[$index]["password"]);
        }
        return User::insert($input);
    }

    public function create($input)
    {
        DB::beginTransaction();
        try {

            $input = $input->toArray();
            $input["password"] = Hash::make($input["password"]);
            $user = User::create($input);

            foreach ($input as $key => $value) {
                if (!method_exists($user, $key)) continue;
                if (empty($input[$key])) continue;


                $class_name = get_class($user->{$key}());

                if (str_contains($class_name, "HasMany")) {
                    $user->{$key}()->createMany($input[$key]);
                    continue;
                }

                $user->{$key}()->create($input[$key]);
            }

            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function update($input, $id)
    {
        DB::beginTransaction();
        try {
            $input = $input->toArray();

            if (!empty($input['password'])) {
                $input["password"] = Hash::make($input["password"]);
            }

            // method 1
            // $user = new User;
            // $user->update($input, ['id' => $id]);
            // return $input;

            // method 2
            // $user = User::find($id);
            // $user->update($input);
            // return $input;

            $user = User::find($id);
            $user->update($input);


            foreach ($input as $key => $value) {
                if (!method_exists($user, $key)) continue;
                if (empty($input[$key])) continue;

                $class_name = get_class($user->{$key}());

                if (str_contains($class_name, "HasMany")) {
                    // method 1
                    // foreach ($input[$key] as $index => $value) {
                    //     $user->{$key}()->where("id", $value["id"])->update($value);
                    // }

                    // method 2
                    $user->{$key}()->upsert($input[$key], ['id']);
                    continue;
                }

                $user->{$key}()->where("id", $input[$key]["id"])->update($input[$key]);
            }

            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateBulk($input)
    {
        $name = 'user 1 edited';
        $input = $input->toArray();

        if (!empty($input['password']))  $input["password"] = Hash::make($input["password"]);

        return User::where('name', $name)->update($input);
    }

    public function updateOrCreate($input, $id)
    {
        $input = $input->toArray();

        if (!empty($input['password']))  $input["password"] = Hash::make($input["password"]);

        return User::updateOrCreate(
            ['id' => $id],
            $input,
        );
    }

    public function save($input, $id = 0)
    {
        $user = new User;
        if ($id > 0) $user = User::find($id);
        if (!empty($input->name)) $user->name = $input->name;
        if (!empty($input->email)) $user->email = $input->email;
        if (!empty($input->password)) $user->password = Hash::make($input->password);
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }

    public function permanetDelete($id)
    {
        return User::findOrFail($id)->forceDelete();
    }

    public function restore($id)
    {
        return User::withTrashed()->findOrFail($id)->restore();
    }

    public function getDeleted()
    {
        return User::onlyTrashed()->get();
    }

    public function getAllWithDeleted()
    {
        return User::withTrashed()->get();
    }

    public function upload($request, $id)
    {
        $file     = $request['file'];
        $fileName = $file->getClientOriginalName();
        $filePath = "public/uploads/${id}";
        $file->storeAs($filePath, $fileName);

        return $filePath . "/" . $fileName;
    }
}
