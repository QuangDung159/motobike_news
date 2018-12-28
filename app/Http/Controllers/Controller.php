<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

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
        // End - Define constant to global using
    }
}
