<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Manufacturer;
use App\Models\Motorbike;
use App\Models\MotorbikeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_CLIENT = "pages.client";

    // use for redirect()
    private $URL_PAGE_HOME = "home";
    private $URL_PAGE_ADMIN_COMMENT_LIST = "admin/comment/list";
    private $URL_PAGE_ADMIN_COMMENT_UPDATE = "admin/comment/update";

    private $UPLOAD_PATH = "upload/images/slide";

    private $PATH_CONFIG_CONSTANT = "constant";

    private $PATH_DEFAULT = "related_post_no_available_image.png";

    public function showHomePage()
    {
        return view($this->DIRECTORY_PAGE_CLIENT . ".home");
    }

    public function showDetailPage($unsigned_title, $id_motorbike)
    {
        Log::info("showDetailPage");
        $motorbike = Motorbike::find($id_motorbike);
        $list_comment = Comment::where("id_motorbike", $id_motorbike)->get();
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
}
