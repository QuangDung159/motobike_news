<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Motorbike;
use App\Models\MotorbikeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MotorbikeController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_MOTORBIKE = "pages.admin.motorbike";

    // use for redirect()
    private $URL_PAGE_ADMIN_MOTORBIKE_ADD = "admin/motorbike/add";
    private $URL_PAGE_ADMIN_MOTORBIKE_LIST = "admin/motorbike/list";
    private $URL_PAGE_ADMIN_MOTORBIKE_UPDATE = "admin/motorbike/update";
    private $UPLOAD_PATH = "upload/images/motorbike";

    private $PATH_CONFIG_CONSTANT = "constant";

    public function showList()
    {
        $list_motorbike = Motorbike::all();
        return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE . ".list",
            [
                "list_motorbike" => $list_motorbike
            ]
        );
    }

    public function showAddPage()
    {
        $list_motorbike_type = MotorbikeType::all();
        $list_manufacturer = Manufacturer::all();
        return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE . ".add",
            [
                "list_motorbike_type" => $list_motorbike_type,
                "list_manufacturer" => $list_manufacturer
            ]
        );
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "motorbike_name" => "required|min:3|max:100|unique:motorbike,name",
                "capacity" => "required|min:3|max:100|",
                "id_motorbike_type" => "required",
                "id_manufacturer" => "required",
                "description" => "required|min:3",
                "thumbnail" => "required"
            ],
            [
                "motorbike_name.required" => "Please provide Motorbike name",
                "motorbike_name.min" => "The Motorbike name is 3 to 100 characters long",
                "motorbike_name.max" => "The Motorbike name is 3 to 100 characters long",
                "motorbike_name.unique" => "The Motorbike name already exists",

                "capacity.required" => "Please provide Capacity number",
                "capacity.min" => "The Capacity number is 3 to 100 characters long",
                "capacity.max" => "The Capacity number is 3 to 100 characters long",

                "id_motorbike_type.required" => "Please provide Motorbike Type name",

                "id_manufacturer.required" => "Please provide Manufacturer name",

                "description.required" => "Please provide Description content",

                "thumbnail.required" => "Please provide thumbnail file"
            ]
        );

        $motorbike = new Motorbike();
        $motorbike->name = $req->motorbike_name;
        $motorbike->id = str_random(5);
        $motorbike->capacity = $req->capacity;
        $motorbike->id_motorbike_type = $req->id_motorbike_type;
        $motorbike->id_manufacturer = $req->id_manufacturer;
        $motorbike->description = $req->description;
        $motorbike->unsigned_title = changeTitle($req->motorbike_name);

        if ($req->hasFile("thumbnail")) {
            $file = $req->file("thumbnail");
            // get file extension
            $file_ext = $file->getClientOriginalExtension();
            if ($file_ext != "jpeg" && $file_ext != "png" && $file_ext != "jpg") {
                return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_ADD)
                    ->with("invalid_type", Config::get($this->PATH_CONFIG_CONSTANT . ".error.invalid_file_type"));
            } else {
                $file_name = $file->getClientOriginalName();
                $file_name_to_save = str_random(10) . $file_name;
                while (file_exists($this->UPLOAD_PATH . $file_name_to_save)) {
                    $file_name_to_save = $file_name . str_random(10);
                }
                $file->move($this->UPLOAD_PATH, $file_name_to_save);
                $motorbike->thumbnail = $file_name_to_save;
            }
        } else {
            $motorbike->thumbnail = "no-image.jpg";
        }
        $motorbike->save();
        return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_ADD)
            ->with("success", Config::get($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }
}
