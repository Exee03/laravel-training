<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;

class CarController extends Controller
{
    public $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


}
