<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // use for view()
    private $DIRECTORY_PAGE_ADMIN_COMMENT = "pages.admin.comment";

    // use for redirect()
    private $URL_PAGE_ADMIN_COMMENT_ADD = "admin/comment/add";
    private $URL_PAGE_ADMIN_COMMENT_LIST = "admin/comment/list";
    private $URL_PAGE_ADMIN_COMMENT_UPDATE = "admin/comment/update";

    private $UPLOAD_PATH = "upload/images/slide";

    private $PATH_CONFIG_CONSTANT = "constant";

    private $PATH_DEFAULT = "related_post_no_available_image.png";

    public function showList()
    {
        $list_comment = Comment::all();
        return view($this->DIRECTORY_PAGE_ADMIN_COMMENT . ".list",
            [
                "list_comment" => $list_comment
            ]
        );
    }
}
