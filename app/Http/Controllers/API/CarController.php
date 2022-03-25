<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CarService;
use Illuminate\Support\Facades\Response;

class CarController extends Controller
{
    public $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function show($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->carService->getById($id),
        ]);
    }

    public function index()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->carService->getAll(),
        ]);
    }
}
