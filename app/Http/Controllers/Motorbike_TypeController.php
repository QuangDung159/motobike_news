<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MotorbikeType;

class Motorbike_TypeController extends Controller
{
    public function showList()
    {
        $list_motorbike_type = MotorbikeType::all();
        return view("pages.admin.motorbike_type.list",
            [
                "list_motorbike_type" => $list_motorbike_type
            ]
        );
    }

    public function showAddPage()
    {
        return view("pages.admin.motorbike_type.add");
    }
}
