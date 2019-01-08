<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntityController extends Controller
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

}
