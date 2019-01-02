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
    ],
    function () {
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
            }
        );
    }
);
