<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_USER = "pages.admin.user";
    private $DIRECTORY_PAGE_ADMIN_DASHBOARD = "pages.admin.dashboard";

    // use for redirect()
    private $URL_PAGE_ADMIN_USER_ADD = "admin/user/add";
    private $URL_PAGE_ADMIN_USER_LIST = "admin/user/list";
    private $URL_PAGE_ADMIN_USER_UPDATE = "admin/user/update";
    private $URL_PAGE_ADMIN_INFO = "admin/info";
    private $URL_PAGE_ADMIN_DASHBOARD = "admin/dashboard";
    private $URL_PAGE_ADMIN_LOGIN = "admin/login";

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
        $user->email = $req->user_email;
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
        if (count($user) > 0) {
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
        if (count($user) > 0) {
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

            // User::where("id", $id)->get();
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

    public function makeLogin(Request $req)
    {
        $this->validate($req,
            [
                "email" => "required",
                "password" => "required",
            ],
            [
                "email.required" => "Please provide your email",

                "password.required" => "Please provide your passwords"
            ]
        );

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect($this->URL_PAGE_ADMIN_DASHBOARD);
        } else {
            return redirect($this->URL_PAGE_ADMIN_LOGIN)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.login_fail"));
        }
    }

    public function makeLogout()
    {
        Auth::logout();
        return redirect($this->URL_PAGE_ADMIN_LOGIN);
    }

    public function showDashboard()
    {
        return view($this->DIRECTORY_PAGE_ADMIN_DASHBOARD);
    }

    public function showListPolicyByUser($id_user)
    {
        Log::info("showListPolicyByUser");
        $user = User::find($id_user);
        if ($user) {
            $role_name = Role::find($user->id_role)->name;
            Log::info("ID Role : " . $user->id_role);
            $list_policy = Policy::where("id_role", $user->id_role)->get();
            return view($this->DIRECTORY_PAGE_ADMIN_USER . ".policy",
                [
                    "list_policy" => $list_policy,
                    "role_name" => $role_name
                ]
            );
        } else {
            return redirect($this->URL_PAGE_ADMIN_DASHBOARD);
        }
    }

    public function showChangePasswordPages($id_user)
    {
        $user = User::find($id_user);
        if ($user) {
            return view($this->DIRECTORY_PAGE_ADMIN_USER . ".change_password");
        } else {
            return redirect($this->URL_PAGE_ADMIN_DASHBOARD);
        }
    }

    public function makeChangePassword($id_user, Request $req)
    {
        Log::info("makeChangePassword");
        $user = User::find($id_user);
        if ($user) {
            $this->validate($req,
                [
                    "current_password" => "required",
                    "new_password" => "required|max:20|min:3",
                    "re_password" => "required|max:20|min:3|same:new_password"
                ],
                [
                    "current_password.required" => "Please provide your Current Password",

                    "new_password.required" => "Please provide your New Password",
                    "new_password.max" => "The New Password is 3 to 20 characters long",
                    "new_password.min" => "The New Password is 3 to 20 characters long",

                    "re_password.required" => "Please provide your Re-Password",
                    "re_password.max" => "The Re-Password is 3 to 20 characters long",
                    "re_password.min" => "The Re-Password is 3 to 20 characters long",
                    "re_password.same" => "The Re-Password does not match with New Password"
                ]
            );
            if (Hash::check($req->current_password, $user->password)) {
                $user->password = bcrypt($req->new_password);
                $user->save();
                return redirect($this->URL_PAGE_ADMIN_INFO . "/change_password/" . $id_user)
                    ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
            } else {
                return redirect($this->URL_PAGE_ADMIN_INFO . "/change_password/" . $id_user)
                    ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.wrong_current_password"));
            }
        } else {
            return redirect($this->URL_PAGE_ADMIN_INFO . "/change_password/" . $id_user)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.update_error"));
        }
    }

    public function showChangeInfoPage($id_user)
    {
        Log::info("showChangeInfoPage");
        $user = User::find($id_user);
        if ($user) {
            return view($this->DIRECTORY_PAGE_ADMIN_USER . ".change_info",
                [
                    "dob" => $user->dob->format("Y-m-d"),
                ]
            );
        } else {
            return redirect($this->URL_PAGE_ADMIN_DASHBOARD);
        }
    }

    public function makeChangeInfo($id_user, Request $req)
    {
        Log::info("makeChangeInfo");
        $user = User::find($id_user);
        if ($user) {
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
                            Rule::unique("user", "email")->ignore($user->email, "email")
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

                    "user_dob.required" => "Please provide User birthday"
                ]
            );
            $user->name = $req->user_name;
            $user->email = $req->user_email;
            $user->dob = $req->user_dob;
            $user->save();
            return redirect($this->URL_PAGE_ADMIN_INFO . "/change_info/" . $id_user)
                ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
        } else {
            return redirect($this->URL_PAGE_ADMIN_INFO . "/change_info/" . $id_user)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.update_error"));
        }
    }
}
