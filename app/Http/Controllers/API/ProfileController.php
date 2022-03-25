<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->profileService->getById($id),
        ]);
    }

    public function index()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->profileService->getAll(),
        ]);
    }
}
