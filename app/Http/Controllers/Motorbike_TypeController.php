<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MotorbikeType;
use Illuminate\Support\Facades\Config;

class Motorbike_TypeController extends Controller
{
    private $DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE = "pages.admin.motorbike_type";

    public function showList()
    {
        $list_motorbike_type = MotorbikeType::all();
        return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE . ".list",
            [
                "list_motorbike_type" => $list_motorbike_type
            ]
        );
    }

    public function showAddPage()
    {
        return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE . ".add");
    }

    public function makeAdd(Request $req)
    {
        $this->validate(
            [
                "motorbike_type_name" => "required|min:3|max:100|unique:MotorbikeType:name"
            ],
            [
                "motorbike_type_name.required" => "Please provide Motorbike Type name",
                "motorbike_type_name.min" => "The Motorbike Type name is 3 to 100 characters long"
            ]
        );
    }
}
