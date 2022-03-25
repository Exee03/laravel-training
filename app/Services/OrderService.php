<?php

namespace App\Services;

use Carbon\Carbon;

class OrderService
{

    public $orders;

    public function __construct()
    {
        $this->orders = [
            [
                "id" => 1,
                "name" => "roti",
                "createdAt" => Carbon::parse('2022-03-21')
            ],
            [
                "id" => 1,
                "name" => "air mineral",
                "createdAt" => Carbon::parse('2022-03-22')
            ],
            [
                "id" => 1,
                "name" => "ayam",
                "createdAt" => Carbon::parse('2022-03-23')
            ]
        ];
    }

    public function getById($id)
    {
        return  collect($this->orders)->where("id", $id)->first();
    }

    public function getAll()
    {
        return  $this->orders;
    }

    public function getAllAt($date)
    {
        return  collect($this->orders)->where('createdAt', '>', $date)->where('createdAt', '<', $date->endOfDay());
    }

    public function getAllFrom($date)
    {
        return  collect($this->orders)->where('createdAt', '>=', $date);
    }

    public function getTotal()
    {
        return  count($this->orders);
    }
}
