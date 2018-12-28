<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

use App\Models\Entity;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        // Begin - Define constant to global using
        View::share("SUBMIT", "Submit");
        View::share("RESET", "Reset");
        View::share("LIST", "List");
        View::share("ADD", "Add");
        View::share("UPDATE", "Update");
        View::share("DELETE", "Delete");
        View::share("URL_ADMIN_ASSET", "asset/admin");
        View::share("URL_ADMIN_MOTORBIKE_TYPE", "admin/motorbike_type");

        View::share("ADMIN", "admin");

        View::share("LIST", "list");
        View::share("ADD", "add");
        View::share("UPDATE", "update");
        View::share("DELETE", "delete");
        // End - Define constant to global using

        $this->getListEntity();
    }

    function getListEntity()
    {
        $list_entity = Entity::all();
        View::share("list_entity", $list_entity);
    }
}
