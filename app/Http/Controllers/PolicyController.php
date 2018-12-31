<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_ROLE = "pages.admin.role";

    // use for redirect()
    private $URL_PAGE_ADMIN_ROLE_ADD = "admin/role/add";
    private $URL_PAGE_ADMIN_ROLE_LIST = "admin/role/list";
    private $URL_PAGE_ADMIN_ROLE_UPDATE = "admin/role/update";
    private $UPLOAD_PATH = "upload/images/role";

    private $PATH_CONFIG_CONSTANT = "constant";

    public function showList()
    {
        $list_policy = DB::select("select r.name, a.name,e.name 
                                  from role r, role_activity r_a, activity a, activity_entity a_e, entity e
                                  where r.id = r_a.id_role 
                                  and r_a.id_activity = a.id
                                  and a.id = a_e.id_activity 
                                  and a_e.id_entity = e.id");
        return view($this->DIRECTORY_PAGE_ADMIN_ROLE . ".list",
            [
                "list_policy" => $list_policy
            ]
        );
    }
}
