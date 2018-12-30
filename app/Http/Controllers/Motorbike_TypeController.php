<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MotorbikeType;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

use App\Models\Entity;

class Motorbike_TypeController extends Controller
{
    private $DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE = "pages.admin.motorbike_type";
    private $URL_PAGE_ADMIN_MOTORBIKE_TYPE_ADD = "admin/motorbike_type/add";
    private $URL_PAGE_ADMIN_MOTORBIKE_TYPE_LIST = "admin/motorbike_type/list";
    private $URL_PAGE_ADMIN_MOTORBIKE_TYPE_UPDATE = "admin/motorbike_type/update";

    public $list = array([]);

    public function __construct()
    {
        parent::__construct();
        $this->list = Entity::all();
    }

    public function showList()
    {
        $list_motorbike_type = MotorbikeType::all();
        return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE . ".list",
            [
                "list_motorbike_type" => $list_motorbike_type,
                "list" => $this->list
            ]
        );
    }

    public function showAddPage()
    {
        return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE . ".add");
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "motorbike_type_name" => "required|min:3|max:100|unique:motorbike_type,name",
            ],
            [
                "motorbike_type_name.required" => "Please provide Motorbike Type name",
                "motorbike_type_name.min" => "The Motorbike Type name is 3 to 100 characters long",
                "motorbike_type_name.max" => "The Motorbike Type name is 3 to 100 characters long",
                "motorbike_type_name.unique" => "The Motorbike Type name already exists"
            ]
        );
        $motorbike_type = new MotorbikeType();
        $motorbike_type->name = $req->motorbike_type_name;
        $motorbike_type->id = str_random(5);
        $motorbike_type->save();
        return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_TYPE_ADD)->with("success", Config::get("constant.success.add_success"));
    }

    public function showUpdatePage($id_motorbike_type)
    {
        $motorbike_type = MotorbikeType::find($id_motorbike_type);
        if (!isset($motorbike_type)) {
            return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_TYPE_LIST);
        } else {
            return view($this->DIRECTORY_PAGE_ADMIN_MOTORBIKE_TYPE . ".update",
                [
                    "motorbike_type" => $motorbike_type
                ]
            );
        }
    }

    public function makeUpdate($id_motorbike_type, Request $req)
    {
        $this->validate($req,
            [
                "motorbike_type_name" =>
                    [
                        "required",
                        "min:3",
                        "max:100",
                        // When you wish to ignore a given ID during the unique check
                        // ignore(primaryKey)
                        Rule::unique("motorbike_type", "name")->ignore($id_motorbike_type)
                    ],
            ],
            [
                "motorbike_type_name.required" => "Please provide Motorbike Type name",
                "motorbike_type_name.min" => "The Motorbike Type name is 3 to 100 characters long",
                "motorbike_type_name.max" => "The Motorbike Type name is 3 to 100 characters long",
                "motorbike_type_name.unique" => "The Motorbike Type name already exists"
            ]
        );
        $motorbike_type = MotorbikeType::find($id_motorbike_type);
        $motorbike_type->name = $req->motorbike_type_name;
        $motorbike_type->save();
        return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_TYPE_UPDATE . "/" . $id_motorbike_type)
            ->with("success", Config::get("constant.success.update_success"));
    }

    public function makeDelete($id_motorbike_type)
    {
        if (!isset($id_motorbike_type)) {
            return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_TYPE_LIST);
        } else {
            $motorbike_type = MotorbikeType::find($id_motorbike_type);
            $motorbike_type->delete();
            return redirect($this->URL_PAGE_ADMIN_MOTORBIKE_TYPE_LIST)
                ->with("success", Config::get("constant.success.delete_success"));
        }
    }
}
