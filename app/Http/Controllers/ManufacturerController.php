<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    private $DIRECTORY_PAGE_ADMIN_MANUFACTURER = "pages.admin.manufacturer";
    private $URL_PAGE_ADMIN_MANUFACTURER_ADD = "admin/manufacturer/add";
    private $URL_PAGE_ADMIN_MANUFACTURER_LIST = "admin/manufacturer/list";
    private $URL_PAGE_ADMIN_MANUFACTURER_UPDATE = "admin/manufacturer/update";

    private $PATH_CONFIG_CONSTANT = "constant";

    //
    public function __construct()
    {
        parent::__construct();
    }

    public function showList()
    {
        $list_manufacturer = Manufacturer::all();
        return view($this->DIRECTORY_PAGE_ADMIN_MANUFACTURER . ".list",
            [
                "list_manufacturer" => $list_manufacturer
            ]
        );
    }

    public function showAddPage()
    {
        return view($this->DIRECTORY_PAGE_ADMIN_MANUFACTURER . ".add");
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "manufacturer_name" => "required|min:3|max:100|unique:manufacturer,name",
            ],
            [
                "manufacturer_name.required" => "Please provide Manufacturer name",
                "manufacturer_name.min" => "The Manufacturer name is 3 to 100 characters long",
                "manufacturer_name.max" => "The Manufacturer name is 3 to 100 characters long",
                "manufacturer_name.unique" => "The Manufacturer name already exists"
            ]
        );

        $manufacturer = new Manufacturer();
        $manufacturer->id = str_random(5);
        $manufacturer->name = $req->manufacturer_name;
        $manufacturer->save();
        return redirect($this->URL_PAGE_ADMIN_MANUFACTURER_ADD)
            ->with("success", Config::get($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }
}