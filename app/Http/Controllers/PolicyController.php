<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Entity;
use App\Models\Policy;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_POLICY = "pages.admin.policy";

    // use for redirect()
    private $URL_PAGE_ADMIN_POLICY_ADD = "admin/policy/add";
    private $URL_PAGE_ADMIN_POLICY_LIST = "admin/policy/list";
    private $URL_PAGE_ADMIN_POLICY_UPDATE = "admin/policy/update";
    private $UPLOAD_PATH = "upload/images/";

    private $PATH_CONFIG_CONSTANT = "constant";

    public function showList()
    {
        $list_policy = Policy::all();
        return view($this->DIRECTORY_PAGE_ADMIN_POLICY . ".list",
            [
                "list_policy" => $list_policy
            ]
        );
    }

    public function showAddPage()
    {
        $list_entity = Entity::all();
        $list_activity = Activity::all();
        $list_role = Role::all();
        return view($this->DIRECTORY_PAGE_ADMIN_POLICY . ".add",
            [
                "list_entity" => $list_entity,
                "list_activity" => $list_activity,
                "list_role" => $list_role
            ]
        );
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "id_role" => "required",
                "id_activity" => "required",
                "id_entity" => "required"
            ],
            [
                "id_role.required" => "Please provide Role",
                "id_activity.required" => "Please provide Activity",
                "id_entity.required" => "Please provide Entity"
            ]
        );

        $policy = Policy::where("id_role", $req->id_role)
            ->where("id_entity", $req->id_entity)
            ->where("id_activity", $req->id_activity)->get();
        if (count($policy) > 0) {
            return redirect($this->URL_PAGE_ADMIN_POLICY_ADD)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.add_error"));
        } else {
            $policy = new Policy();
            $policy->id_role = $req->id_role;
            $policy->id_activity = $req->id_activity;
            $policy->id_entity = $req->id_entity;
            $policy->save();
            return redirect($this->URL_PAGE_ADMIN_POLICY_ADD)
                ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
        }
    }

    public function showUpdatePage($id)
    {
        $policy = Policy::where("id", $id)->get();
        if (count($policy) > 0) {
            $list_entity = Entity::all();
            $list_activity = Activity::all();
            $list_role = Role::all();
            return view($this->DIRECTORY_PAGE_ADMIN_POLICY . ".update",
                [
                    "policy" => $policy[0],
                    "list_entity" => $list_entity,
                    "list_activity" => $list_activity,
                    "list_role" => $list_role
                ]
            );
        } else {
            return redirect($this->URL_PAGE_ADMIN_POLICY_LIST);
        }
    }

    public function makeUpdate(Request $req, $id)
    {
        $this->validate($req,
            [
                "id_role" => "required",
                "id_activity" => "required",
                "id_entity" => "required"
            ],
            [
                "id_role.required" => "Please provide Role",
                "id_activity.required" => "Please provide Activity",
                "id_entity.required" => "Please provide Entity"
            ]
        );
        $policy = Policy::where("id", $id)->get();
        $other_policy = Policy::where("id_role", $req->id_role)
            ->where("id_activity", $req->id_activity)
            ->where("id_entity", $req->id_entity)->get();
        if (count($other_policy) > 0) {
            if ($other_policy[0]->id == $id) {
                return redirect($this->URL_PAGE_ADMIN_POLICY_UPDATE . "/" . $id)
                    ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
            } else {
                return redirect($this->URL_PAGE_ADMIN_POLICY_UPDATE . "/" . $id)
                    ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.update_error"));
            }
        } else {
            $policy[0]->id_role = $req->id_role;
            $policy[0]->id_activity = $req->id_activity;
            $policy[0]->id_entity = $req->id_entity;
            $policy[0]->save();
            return redirect($this->URL_PAGE_ADMIN_POLICY_UPDATE . "/" . $id)
                ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
        }
    }
}
