<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SlideController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_SLIDE = "pages.admin.slide";

    // use for redirect()
    private $URL_PAGE_ADMIN_SLIDE_ADD = "admin/slide/add";
    private $URL_PAGE_ADMIN_SLIDE_LIST = "admin/slide/list";
    private $URL_PAGE_ADMIN_SLIDE_UPDATE = "admin/slide/update";

    private $UPLOAD_PATH = "upload/images/slide";

    private $PATH_CONFIG_CONSTANT = "constant";

    private $PATH_DEFAULT = "related_post_no_available_image.png";

    public function showList()
    {
        $list_slide = Slide::all();
        return view($this->DIRECTORY_PAGE_ADMIN_SLIDE . ".list",
            [
                "list_slide" => $list_slide
            ]
        );
    }

    public function showAddPage()
    {
        return view($this->DIRECTORY_PAGE_ADMIN_SLIDE . ".add");
    }

    public function makeAdd(Request $req)
    {
        $this->validate($req,
            [
                "slide_name" =>
                    [
                        "required",
                        "max:100",
                        "min:3",
                        "unique:slide,name"
                    ],
                "slide_link" =>
                    [
                        "required",
                        "max:255",
                        "min:3"
                    ],
                "thumbnail" =>
                    [
                        "required",
                        //"max:255",
                    ]
            ],
            [
                "slide_name.required" => "Please provide Slide name",
                "slide_name.max" => "The Slide name is 3 to 100 characters long",
                "slide_name.min" => "The Slide name is 3 to 100 characters long",
                "slide_name.unique" => "The Slide name already exists",

                "slide_link.required" => "Please provide Slide link",
                "slide_link.max" => "The Slide link is 3 to 255 characters long",
                "slide_link.min" => "The Slide link is 3 to 255 characters long",

                "thumbnail.required" => "Please provide Preview",
                //"thumbnail.max" => "The thumbnail name is 3 to 255 characters long",
            ]
        );
        $slide = new Slide();
        $slide->name = $req->slide_name;
        $slide->id = str_random(5);
        $slide->link = $req->slide_link;

        if ($req->hasFile("thumbnail")) {
            $file = $req->file("thumbnail");
            // Get file extension
            $file_ext = $file->getClientOriginalExtension();
            if ($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg") {
                return redirect($this->URL_PAGE_ADMIN_SLIDE_ADD)
                    ->with("invalid_type", config($this->PATH_CONFIG_CONSTANT . ".error.invalid_type"));
            } else {
                $file_name = $file->getClientOriginalName();
                $file_name_to_save = str_random(10) . $file_name;
                // Check file name existed
                while (file_exists($this->UPLOAD_PATH . "/" . $file_name_to_save)) {
                    $file_name_to_save = str_random(10) . $file_name;
                }
                $file->move($this->UPLOAD_PATH, $file_name_to_save);
                $slide->path = $file_name_to_save;
            }
        } else {
            $slide->path = $this->PATH_DEFAULT;
        }
        $slide->save();
        return redirect($this->URL_PAGE_ADMIN_SLIDE_ADD)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.add_success"));
    }

    public function showUpdatePage($id_slide)
    {
        $slide = Slide::find($id_slide);
        return view($this->DIRECTORY_PAGE_ADMIN_SLIDE . ".update",
            [
                "slide" => $slide
            ]
        );
    }

    public function makeUpdate(Request $req, $id_slide)
    {
        $this->validate($req,
            [
                "slide_name" =>
                    [
                        "required",
                        "max:100",
                        "min:3",
                        Rule::unique("slide", "name")->ignore($id_slide)
                    ],
                "slide_link" =>
                    [
                        "required",
                        "max:255",
                        "min:3"
                    ],
                "thumbnail" =>
                    [
                        "required",
                        //"max:255",
                    ]
            ],
            [
                "slide_name.required" => "Please provide Slide name",
                "slide_name.max" => "The Slide name is 3 to 100 characters long",
                "slide_name.min" => "The Slide name is 3 to 100 characters long",
                "slide_name.unique" => "The Slide name already exists",

                "slide_link.required" => "Please provide Slide link",
                "slide_link.max" => "The Slide link is 3 to 255 characters long",
                "slide_link.min" => "The Slide link is 3 to 255 characters long",

                "thumbnail.required" => "Please provide Preview",
                //"thumbnail.max" => "The thumbnail name is 3 to 255 characters long",
            ]
        );

        $slide = Slide::find($id_slide);
        $slide->name = $req->slide_name;
        $slide->link = $req->slide_link;
        if ($req->hasFile("thumbnail")) {
            $file = $req->file("thumbnail");
            $file_ext = $file->getClientOriginalExtension();
            // Check file extension
            if ($file_ext != "jpg" && $file_ext != "jpeg" && $file_ext != "png") {
                return redirect($this->URL_PAGE_ADMIN_SLIDE_UPDATE . "/" . $id_slide)
                    ->with("invalid_type", config($this->PATH_CONFIG_CONSTANT . ".error.invalid_type"));
            } else {
                $file_name = $file->getClientOriginalName();
                $file_name_to_save = str_random(10) . $file_name;
                while (file_exists($this->UPLOAD_PATH . "/" . $file_name_to_save)) {
                    $file_name_to_save = str_random(10) . $file_name;
                }

                // If current image is default -> do not delete
                if ($slide->path != $this->PATH_DEFAULT) {
                    unlink($this->UPLOAD_PATH . "/" . $slide->path);
                }
                $slide->path = $file_name_to_save;

                $file->move($this->UPLOAD_PATH, $file_name_to_save);
            }
        } else {
            $slide->path = $this->PATH_DEFAULT;
        }
        $slide->save();
        return redirect($this->URL_PAGE_ADMIN_SLIDE_UPDATE . "/" . $id_slide)
            ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.update_success"));
    }

    public function makeDelete($id_slide)
    {
        $slide = Slide::find($id_slide);
        if ($slide) {
            // If current image is default -> do not delete
            if ($slide->path != $this->PATH_DEFAULT) {
                unlink($this->UPLOAD_PATH . "/" . $slide->path);
            }
            $slide->delete();
            return redirect($this->URL_PAGE_ADMIN_SLIDE_LIST)
                ->with("success", config($this->PATH_CONFIG_CONSTANT . ".success.delete_success"));
        } else {
            return redirect($this->URL_PAGE_ADMIN_SLIDE_LIST)
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.delete_error"));
        }
    }
}
