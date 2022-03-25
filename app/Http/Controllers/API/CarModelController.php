<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CarModelService;
use Illuminate\Support\Facades\Response;

class CarModelController extends Controller
{
    public $carModelService;

    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService = $carModelService;
    }

    public function show($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->carModelService->getById($id),
        ]);
    }

    public function index()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->carModelService->getAll(),
        ]);
    }
}
