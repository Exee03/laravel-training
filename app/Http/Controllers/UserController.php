<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // create page
    public function create()
    {
        return view('user/create');
    }

    // edit page
    public function edit($id)
    {
        return view('user/edit');
    }

    // show page
    public function show($id)
    {
        $user = $this->userService->getById($id);
        return view('user/show', [
            "user" =>  $user
        ]);
    }

    // index page
    public function index()
    {
        $users = $this->userService->getAll();
        return view('user/index', [
            "users" =>  $users
        ]);
    }

    // save
    public function store($id)
    {
        return redirect(route('user/show', ["id" => $id]));
    }

    // update
    public function update($id)
    {
        return redirect(route('user/show', ["id" => $id]));
    }

    // delete
    public function destroy()
    {
        return redirect(route('user/index'));
    }
}
