<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\OrderService;

class OrderController extends Controller
{
    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function show($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->orderService->getById($id),
        ]);
    }

    public function index()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->orderService->getAll(),
        ]);
    }

    public function filterDateAt($date)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->orderService->getAllAt($date),
        ]);
    }

    public function filterDateFrom($date)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->orderService->getAllFrom($date),
        ]);
    }

    public function count()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->orderService->getTotal(),
        ]);
    }
}
