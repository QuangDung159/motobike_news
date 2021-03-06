<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        "prefix" => "admin",
        "middleware" => "policy"
    ],
    function () {
        Route::get("dashboard", "UserController@showDashboard");
        Route::group(
            [
                "prefix" => "motorbike_type",
            ],
            function () {
                $CONTROLLER_NAME = "Motorbike_TypeController";
                Route::get("list", $CONTROLLER_NAME . "@showList");
                Route::get("add", $CONTROLLER_NAME . "@showAddPage");
                Route::post("add", $CONTROLLER_NAME . "@makeAdd");
                Route::get("update/{id_motorbike_type}", $CONTROLLER_NAME . "@showUpdatePage");
                Route::post("update/{id_motorbike_type}", $CONTROLLER_NAME . "@makeUpdate");
                Route::get("delete/{id_motorbike_type}", $CONTROLLER_NAME . "@makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "manufacturer",
            ],
            function () {
                $CONTROLLER_NAME = "ManufacturerController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
                Route::get("add", $CONTROLLER_NAME . "showAddPage");
                Route::post("add", $CONTROLLER_NAME . "makeAdd");
                Route::get("update/{id_manufacturer}", $CONTROLLER_NAME . "showUpdatePage");
                Route::post("update/{id_manufacturer}", $CONTROLLER_NAME . "makeUpdate");
                Route::get("delete/{id_manufacturer}", $CONTROLLER_NAME . "makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "motorbike"
            ],
            function () {
                $CONTROLLER_NAME = "MotorbikeController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
                Route::get("add", $CONTROLLER_NAME . "showAddPage");
                Route::post("add", $CONTROLLER_NAME . "makeAdd");
                Route::get("update/{id_motorbike}", $CONTROLLER_NAME . "showUpdatePage");
                Route::post("update/{id_motorbike}", $CONTROLLER_NAME . "makeUpdate");
                Route::get("delete/{id_motorbike}", $CONTROLLER_NAME . "makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "role"
            ],
            function () {
                $CONTROLLER_NAME = "RoleController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
                Route::get("add", $CONTROLLER_NAME . "showAddPage");
                Route::post("add", $CONTROLLER_NAME . "makeAdd");
                Route::get("update/{id_role}", $CONTROLLER_NAME . "showUpdatePage");
                Route::post("update/{id_role}", $CONTROLLER_NAME . "makeUpdate");
                Route::get("delete/{id_role}", $CONTROLLER_NAME . "makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "policy"
            ],
            function () {
                $CONTROLLER_NAME = "PolicyController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
                Route::get("add", $CONTROLLER_NAME . "showAddPage");
                Route::post("add", $CONTROLLER_NAME . "makeAdd");
                Route::get("update/{id}", $CONTROLLER_NAME . "showUpdatePage");
                Route::post("update/{id}", $CONTROLLER_NAME . "makeUpdate");
                Route::get("delete/{id}", $CONTROLLER_NAME . "makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "user"
            ],
            function () {
                $CONTROLLER_NAME = "UserController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
                Route::get("add", $CONTROLLER_NAME . "showAddPage");
                Route::post("add", $CONTROLLER_NAME . "makeAdd");
                Route::get("update/{id}", $CONTROLLER_NAME . "showUpdatePage");
                Route::post("update/{id}", $CONTROLLER_NAME . "makeUpdate");
                Route::get("delete/{id}", $CONTROLLER_NAME . "makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "slide"
            ],
            function () {
                $CONTROLLER_NAME = "SlideController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
                Route::get("add", $CONTROLLER_NAME . "showAddPage");
                Route::post("add", $CONTROLLER_NAME . "makeAdd");
                Route::get("update/{id_slide}", $CONTROLLER_NAME . "showUpdatePage");
                Route::post("update/{id_slide}", $CONTROLLER_NAME . "makeUpdate");
                Route::get("delete/{id_slide}", $CONTROLLER_NAME . "makeDelete");
            }
        );
        Route::group(
            [
                "prefix" => "comment"
            ],
            function () {
                $CONTROLLER_NAME = "CommentController@";
                Route::get("list", $CONTROLLER_NAME . "showList");
            }
        );
        Route::group(
            [
                "prefix" => "info"
            ],
            function () {
                $CONTROLLER_NAME = "UserController@";
                Route::get("policy/{id_user}", $CONTROLLER_NAME . "showListPolicyByUser");
                Route::get("change_password/{id_user}", $CONTROLLER_NAME . "showChangePasswordPages");
                Route::post("change_password/{id_user}", $CONTROLLER_NAME . "makeChangePassword");
                Route::get("change_info/{id_user}", $CONTROLLER_NAME . "showChangeInfoPage");
                Route::post("change_info/{id_user}", $CONTROLLER_NAME . "makeChangeInfo");
            }
        );
    }
);

Route::get("admin/login", "UserController@showLogin");
Route::post("admin/login", "UserController@makeLogin");
Route::get("admin/logout", "UserController@makeLogout");

Route::group(
    [
        "middleware" => "client"
    ],
    function () {
        $CONTROLLER_NAME = "ClientController@";
        Route::get("home", $CONTROLLER_NAME . "showHomePage");
        Route::get("motorbike/{unsigned_title}/{id_motorbike}", $CONTROLLER_NAME . "showDetailPage");
        Route::get("manufacturer/{id_manufacturer}", $CONTROLLER_NAME . "showManufacturerPage");
        Route::post("motorbike/{unsigned_title}/{id_motorbike}/{id_user}", $CONTROLLER_NAME . "makeSubmitComment");
        Route::get("login_user", $CONTROLLER_NAME . "showLoginPage");
        Route::post("login_user", $CONTROLLER_NAME . "makeLogin");
        Route::get("logout_user", $CONTROLLER_NAME . "makeLogout");
        Route::get("manufacturer/motorbike/{id_manufacturer}/{id_motorbike}", $CONTROLLER_NAME . "getListMotorbikeByManufacturerAndMotorbike");
        Route::get("register_user", $CONTROLLER_NAME . "showRegisterPage");
        Route::post("register_user", $CONTROLLER_NAME . "makeRegisterUser");
    }
);

Auth::routes();
