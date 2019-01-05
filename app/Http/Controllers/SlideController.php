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

    private $PATH_CONFIG_CONSTANT = "constant";

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

    public function makeAddPage(Request $req)
    {
        $this->validate($req,
            [
                "slide_name" =>
                    [
                        "required",
                        "max:100",
                        "min:3",
                        "unique"
                    ],
                "slide_link" =>
                    [
                        "required",
                        "max:100",
                        "min:3"
                    ],
                "thumbnail" =>
                    [
                        "required",
                        "max:100",
                    ]
            ],
            [
                "slide_name.required" => "Please provide Slide name",
                "slide_name.max" => "The Slide name is 3 to 100 characters long",
                "slide_name.min" => "The Slide name is 3 to 100 characters long",
                "slide_name.unique" => "The Slide name already exists",

                "slide_link.required" => "Please provide Slide link",
                "slide_link.max" => "The Slide link is 3 to 100 characters long",
                "slide_link.min" => "The Slide link is 3 to 100 characters long",

                "thumbnail.required" => "Please provide Preview",
                "thumbnail.max" => "The Slide link is 3 to 100 characters long",
            ]
        );
    }
}
