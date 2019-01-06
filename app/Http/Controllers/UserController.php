<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_USER = "pages.admin.user";

    // use for redirect()
    private $URL_PAGE_ADMIN_USER_ADD = "admin/user/add";
    private $URL_PAGE_ADMIN_USER_LIST = "admin/user/list";
    private $URL_PAGE_ADMIN_USER_UPDATE = "admin/user/update";
    private $UPLOAD_PATH = "upload/images/";

    private $DIRECTORY_PAGE_ADMIN_LOGIN = "pages.admin.login";

    private $PATH_CONFIG_CONSTANT = "constant";

    public function showList()
    {
        $list_user = User::all();
        return view($this->DIRECTORY_PAGE_ADMIN_USER . ".list",
            [
                "list_user" => $list_user
            ]
        );
    }

    public function showAddPage()
    {
        $list_role = Role::all();
        return view($this->DIRECTORY_PAGE_ADMIN_USER . ".add",
            [
                "list_role" => $list_role
            ]
        );
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "user_name" =>
                    [
                        "required",
                        "max:100",
                        "min:3"
                    ],
                "user_email" =>
                    [
                        "required",
                        "max:100",
                        "min:3",
                        "unique:User,email"
                    ],
                "id_role" =>
                    [
                        "required"
                    ],
                "password" => "required",
                "user_dob" => "required"
            ],
            [
                "user_name.required" => "Please provide User name",
                "user_name.min" => "The user name is 3 to 100 characters long",
                "user_name.max" => "The user name is 3 to 100 characters long",

                "user_email.required" => "Please provide User email",
                "user_email.min" => "The user email is 3 to 100 characters long",
                "user_email.max" => "The user email is 3 to 100 characters long",
                "user_email.unique" => "The User email already exists",

                "id_role.required" => "Please provide Role name",

                "password.required" => "Please provide Password",

                "user_dob.required" => "Please provide User birthday"
            ]
        );

        $user = new User();
        $user->id_role = $req->id_role;
        $user->id = str_random(5);
        $user->name = $req->user_name;
        $user->email = $req->user_name;
        $user->password = bcrypt($req->password);
        $user->dob = $req->user_dob;
        $user->save();
        return redirect($this->URL_PAGE_ADMIN_USER_ADD)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }

    public function showUpdatePage($id)
    {
        $user = User::where("id", $id)->get();
        $list_role = Role::all();
        if (count($user[0]) > 0) {
            return view($this->DIRECTORY_PAGE_ADMIN_USER . ".update",
                [
                    "dob" => $user[0]->dob->format("Y-m-d"),
                    "user" => $user[0],
                    "list_role" => $list_role
                ]
            );
        } else {
            return view($this->DIRECTORY_PAGE_ADMIN_USER . ".list");
        }
    }

    public function makeUpdate(Request $req, $id)
    {
        $user = User::where("id", $id)->get();
        if (count($user[0]) > 0) {
            $this->validate($req,
                [
                    "user_name" =>
                        [
                            "required",
                            "max:100",
                            "min:3"
                        ],
                    "user_email" =>
                        [
                            "required",
                            "max:100",
                            "min:3",
                            Rule::unique("user", "email")->ignore($user[0]->email, "email")
                        ],
                    "id_role" =>
                        [
                            "required"
                        ],
                    "user_dob" => "required"
                ],
                [
                    "user_name.required" => "Please provide User name",
                    "user_name.min" => "The user name is 3 to 100 characters long",
                    "user_name.max" => "The user name is 3 to 100 characters long",

                    "user_email.required" => "Please provide User email",
                    "user_email.min" => "The user email is 3 to 100 characters long",
                    "user_email.max" => "The user email is 3 to 100 characters long",
                    "user_email.unique" => "The User email already exists",

                    "id_role.required" => "Please provide Role name",

                    "user_dob.required" => "Please provide User birthday"
                ]
            );
            $user[0]->name = $req->user_name;
            $user[0]->dob = $req->user_dob;
            $user[0]->id_role = $req->id_role;
            $user[0]->email = $req->user_email;
            $user[0]->save();
            return redirect($this->URL_PAGE_ADMIN_USER_UPDATE . "/" . $id)
                ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
        } else {
            return redirect($this->URL_PAGE_ADMIN_USER_UPDATE . "/" . $id)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.update_error"));
        }
    }

    public function makeDelete($id)
    {
        $user = User::where("id", $id)->get();
        if (count($user) > 0) {
            $user = $user[0];
            $user->delete();
            return redirect($this->URL_PAGE_ADMIN_USER_LIST)
                ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.delete_success"));
        } else {
            return redirect($this->URL_PAGE_ADMIN_USER_LIST)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.delete_error"));
        }
    }

    public function showLogin()
    {
        return view("pages.admin.login");
    }
}
