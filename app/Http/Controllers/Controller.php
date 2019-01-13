<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Motorbike;
use App\Models\MotorbikeType;
use App\Models\Slide;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        Log::info("----------------------------------------------");
        // Begin - Define constant to global using
        View::share("SUBMIT", "Submit");
        View::share("RESET", "Reset");

        View::share("LIST", "List");
        View::share("ADD", "Add");
        View::share("UPDATE", "Update");
        View::share("DELETE", "Delete");

        View::share("URL_ADMIN_ASSET", "asset/admin");
        View::share("URL_CLIENT_ASSET", "asset/client");
        View::share("IMAGES_PATH", "upload/images");

        View::share("URL_ADMIN_MOTORBIKE_TYPE", "admin/motorbike_type");
        View::share("URL_ADMIN_MANUFACTURER", "admin/manufacturer");
        View::share("URL_ADMIN_MOTORBIKE", "admin/motorbike");
        View::share("URL_ADMIN_ROLE", "admin/role");
        View::share("URL_ADMIN_POLICY", "admin/policy");
        View::share("URL_ADMIN_USER", "admin/user");
        View::share("URL_ADMIN_SLIDE", "admin/slide");
        View::share("URL_ADMIN_INFO", "admin/info");

        View::share("ADMIN", "admin");

        View::share("LIST", "list");
        View::share("ADD", "add");
        View::share("UPDATE", "update");
        View::share("DELETE", "delete");

        View::share("URL_ADMIN_LOGOUT", "admin/logout");
        View::share("URL_ADMIN_LOGIN", "admin/login");
        View::share("URL_ADMIN_DASHBOARD", "admin/dashboard");
        // End - Define constant to global using

        $this->getListManufacturer();
        $this->getListMotorbikeType();
        $this->getListSlide();
    }

    public function getListManufacturer()
    {
        $list_manufacturer = Manufacturer::all();
        View::share("list_manufacturer", $list_manufacturer);
        return $list_manufacturer;
    }

    public function getListMotorbikeType()
    {
        $list_motorbike_type = MotorbikeType::all();
        View::share("list_motorbike_type", $list_motorbike_type);
        return $list_motorbike_type;
    }

    public function getListSlide()
    {
        $list_slide = Slide::all();
        View::share("list_slide", $list_slide);
        return $list_slide;
    }
}
