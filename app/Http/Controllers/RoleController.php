<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_ROLE = "pages.admin.role";

    // use for redirect()
    private $URL_PAGE_ADMIN_ROLE_ADD = "admin/role/add";
    private $URL_PAGE_ADMIN_ROLE_LIST = "admin/role/list";
    private $URL_PAGE_ADMIN_ROLE_UPDATE = "admin/role/update";

    private $PATH_CONFIG_CONSTANT = "constant";

    public function showList()
    {
        $list_role = Role::all();
        return view($this->DIRECTORY_PAGE_ADMIN_ROLE . ".list",
            [
                "list_role" => $list_role
            ]
        );
    }

    public function showAddPage()
    {
        return view($this->DIRECTORY_PAGE_ADMIN_ROLE . ".add");
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "role_name" => "required|min:3|max:100|unique:role,name",
            ],
            [
                "role_name.required" => "Please provide Role name",
                "role_name.min" => "The Role name is 3 to 100 characters long",
                "role_name.max" => "The Role name is 3 to 100 characters long",
                "role_name.unique" => "The Role name already exists"
            ]
        );

        $role = new Role();
        $role->id = str_random(5);
        $role->name = $req->role_name;
        $role->save();
        return redirect($this->URL_PAGE_ADMIN_ROLE_ADD)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }

    public function showUpdatePage($id_role)
    {
        $role = Role::find($id_role);
        if ($role) {
            $list_role_activity = $role->role_activities;
            return view($this->DIRECTORY_PAGE_ADMIN_ROLE . ".update",
                [
                    "role" => $role,
                    "list_role_activity" => $list_role_activity
                ]
            );
        } else {
            return redirect($this->URL_PAGE_ADMIN_ROLE_LIST);
        }
    }

    public function makeUpdate(Request $req, $id_role)
    {
        $this->validate($req,
            [
                "role_name" =>
                    [
                        "required",
                        "min:3",
                        "max:100",
                        Rule::unique("role", "name")->ignore($id_role)
                    ],
            ],
            [
                "role_name.required" => "Please provide Role name",
                "role_name.min" => "The Role name is 3 to 100 characters long",
                "role_name.max" => "The Role name is 3 to 100 characters long",
                "role_name.unique" => "The Role name already exists"
            ]
        );

        $role = Role::find($id_role);
        $role->name = $req->role_name;
        $role->save();
        return redirect($this->URL_PAGE_ADMIN_ROLE_UPDATE . "/" . $id_role)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
    }

    public function makeDelete($id_role)
    {
        $role = Role::find($id_role);
        if ($role) {
            $list_activity = $role->role_activities;
            if (count($list_activity) > 0) {
                return redirect($this->URL_PAGE_ADMIN_ROLE_LIST)
                    ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.delete_error"));
            } else {
                $role->delete();
                return redirect($this->URL_PAGE_ADMIN_ROLE_LIST)
                    ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.delete_success"));
            }
        } else {
            return redirect($this->URL_PAGE_ADMIN_ROLE_LIST);
        }
    }
}
