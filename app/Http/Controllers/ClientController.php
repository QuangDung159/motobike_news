<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Manufacturer;
use App\Models\Motorbike;
use App\Models\MotorbikeType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_CLIENT = "pages.client";
    // use for redirect()
    private $URL_PAGE_HOME = "home";
    private $URL_PAGE_LOGIN = "login_user";
    private $PATH_CONFIG_CONSTANT = "constant";

    public function addLinkToSession($link)
    {
        Log::info("addLinkToSession");
        if ($link != "http://localhost:8090/motobike_news/public/login_user" && $link != "http://localhost:8090/motobike_news/public/register_user") {
            $links = session()->has('links') ? session('links') : [];
            array_unshift($links, $link); // Putting it in the beginning of links array
            session(['links' => $links]); // Saving links array to the session
            $count = count(session("links"));
            foreach (session("links") as $link) {
                if ($count > 10) {
                    array_pop($links);
                }
                $count--;
            }
            session(['links' => $links]);
        }
    }

    public function showHomePage()
    {
        $this->addLinkToSession(URL::current());
        return view($this->DIRECTORY_PAGE_CLIENT . ".home");
    }

    public function showDetailPage($unsigned_title, $id_motorbike)
    {
        $this->addLinkToSession(URL::current());
        $motorbike = Motorbike::find($id_motorbike);
        $list_comment = Comment::where("id_motorbike", $id_motorbike)
            ->orderBy("created_at", "desc")->get();
        if (isset($motorbike)) {
            $list_highlights = Motorbike::orderBy("views", "desc")->take(4)->get();
            $list_ref = Motorbike::where("id_manufacturer", $motorbike->id_manufacturer)
                ->where("id", "!=", "$id_motorbike")
                ->orderBy("views", "desc")->take(4)->get();
            View::share("list_highlights", $list_highlights);
            View::share("list_ref", $list_ref);
            return view($this->DIRECTORY_PAGE_CLIENT . ".motorbike_detail",
                [
                    "motorbike" => $motorbike,
                    "list_comment" => $list_comment
                ]
            );
        } else {
            return redirect($this->URL_PAGE_HOME);
        }
    }

    public function makeSubmitComment($unsigned_title, $id_motorbike, $id_user, Request $req)
    {
        $this->validate($req,
            [
                "comment" =>
                    [
                        "required",
                        "max:255",
                        "min:3"
                    ],
            ],
            [
                "comment.required" => "Please provide your comment",
                "comment.min" => "Comment is 3 to 255 characters long",
                "comment.max" => "Comment is 3 to 255 characters long"
            ]
        );
        $comment = new Comment();
        $comment->id = str_random(5);
        $comment->content = $req->comment;
        $comment->id_motorbike = $id_motorbike;
        $comment->id_user = $id_user;
        $comment->save();
        return redirect("motorbike/" . $unsigned_title . "/" . $id_motorbike)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }

    public function showLoginPage()
    {
        return view($this->DIRECTORY_PAGE_CLIENT . ".login");
    }

    public function makeLogin(Request $req)
    {
        $this->validate($req,
            [
                "email" => "required",
                "password" => "required"
            ],
            [
                "email.required" => "Please provide your email",
                "password.required" => "Please provide your password"
            ]
        );
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(session("links")[2]);
        } else {
            return redirect($this->URL_PAGE_LOGIN)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.login_fail"));
        }
    }

    public function makeLogout()
    {
        Auth::logout();
        return redirect(URL::previous());
    }

    public function showManufacturerPage($id_manufacturer)
    {
        $manufacturer = Manufacturer::find($id_manufacturer);
        $list_motorbike = Motorbike::where("id_manufacturer", $id_manufacturer)
            ->orderBy("updated_at", "desc")
            ->get();
        return view($this->DIRECTORY_PAGE_CLIENT . ".manufacturer",
            [
                "list_motorbike" => $list_motorbike,
                "manufacturer" => $manufacturer
            ]
        );
    }

    public function getListMotorbikeByManufacturerAndMotorbike($id_manufacturer, $id_motorbike_type)
    {
        $this->addLinkToSession(URL::current());
        $list_motorbike = Motorbike::where("id_manufacturer", $id_manufacturer)
            ->where("id_motorbike_type", $id_motorbike_type)->paginate(5);
        $manufacturer_name = Manufacturer::find($id_manufacturer)->name;
        $motorbike_type_name = MotorbikeType::find($id_motorbike_type)->name;
        return view($this->DIRECTORY_PAGE_CLIENT . ".manufacturer_motorbike_type",
            [
                "list_motorbike" => $list_motorbike,
                "manufacturer_name" => $manufacturer_name,
                "motorbike_type_name" => $motorbike_type_name
            ]
        );
    }

    public function showRegisterPage()
    {
        return view($this->DIRECTORY_PAGE_CLIENT . ".register");
    }

    public function makeRegisterUser(Request $req)
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
                "password" => "required",
                "re_password" => "required|same:password",
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

                "password.required" => "Please provide Password",

                "re_password.same" => "The Re-Password does not match with New Password",

                "user_dob.required" => "Please provide User birthday"
            ]
        );

        $user = new User();
        $user->id = str_random(5);
        $user->name = $req->user_name;
        $user->email = $req->user_email;
        $user->dob = $req->user_dob;
        $user->id_role = 4;
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect($this->URL_PAGE_LOGIN)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.register_success"));
    }
}