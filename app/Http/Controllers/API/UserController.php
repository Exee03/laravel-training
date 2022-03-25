<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getById($id),
        ]);
    }

    public function index()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getAll(),
        ]);
    }
}
