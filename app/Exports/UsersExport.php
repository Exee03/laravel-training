<?php

namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class UsersExport implements FromCollection, WithHeadings
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
    //     "id" => 3
    // "name" => "user 3"
    // "email" => "user3@example.com"
    // "email_verified_at" => null
    // "created_at" => "2022-03-31T07:19:24.000000Z"
    // "updated_at" => "2022-03-31T07:19:24.000000Z"
    // "deleted_at" => null
    // "address" => "No 3, Jalan 3"
        return ["ID", "Name","Email", "Email Verified At", "Created At", "Updated At", "Deleted At", "Address"];
    }
}
