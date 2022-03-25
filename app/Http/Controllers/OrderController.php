<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{

    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    // create page
    public function create()
    {
        return view('order/create');
    }

    // edit page
    public function edit($id)
    {
        return view('order/edit');
    }

    // show page
    public function show($id)
    {
        $order = $this->orderService->getById($id);
        return view('order/show', [
            "order" =>  $order
        ]);
    }

    // index page
    public function index()
    {
        $total = $this->orderService->getTotal();
        $orders = $this->orderService->getAll();
        return view('order/index', [
            "orders" =>  $orders,
            "total" =>  $total,
        ]);
    }

    // save
    public function store($id)
    {
        return redirect(route('order/show', ["id" => $id]));
    }

    // update
    public function update($id)
    {
        return redirect(route('order/show', ["id" => $id]));
    }

    // delete
    public function destroy()
    {
        return redirect(route('order/index'));
    }
}
