<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Manufacturer;
use App\Models\Motorbike;
use App\Models\MotorbikeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_CLIENT = "pages.client";

    // use for redirect()
    private $URL_PAGE_HOME = "home";
    private $URL_PAGE_LOGIN = "login_user";

    private $PATH_CONFIG_CONSTANT = "constant";

    public function showHomePage()
    {
        return view($this->DIRECTORY_PAGE_CLIENT . ".home");
    }

    public function showDetailPage($unsigned_title, $id_motorbike)
    {
        Log::info("showDetailPage");
        $motorbike = Motorbike::find($id_motorbike);
        $list_comment = Comment::where("id_motorbike", $id_motorbike)
            ->orderBy("created_at", "desc")->get();
        if (isset($motorbike)) {
            Log::info("motorbike ID : " . $motorbike->id);
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
        Log::info("makeSubmitComment");
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
        return redirect($unsigned_title . "/" . $id_motorbike)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }

    public function showLoginPage()
    {
        Log::info("showLoginPage");
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
            return redirect($this->URL_PAGE_HOME);
        } else {
            return redirect($this->URL_PAGE_LOGIN)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.login_fail"));
        }
    }

    public function makeLogout()
    {
        Auth::logout();
        return redirect($this->URL_PAGE_HOME);
    }
}
