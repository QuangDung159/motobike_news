<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PolicyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    // use for view()
    private $DIRECTORY_PAGE_ADMIN_SLIDE = "pages.admin.slide";

    // use for redirect()
    private $URL_PAGE_ADMIN_SLIDE_ADD = "admin/slide/add";
    private $URL_PAGE_ADMIN_SLIDE_LIST = "admin/slide/list";
    private $URL_PAGE_ADMIN_SLIDE_UPDATE = "admin/slide/update";

    private $UPLOAD_PATH = "upload/images/slide";

    private $PATH_CONFIG_CONSTANT = "constant";

    private $PATH_DEFAULT = "related_post_no_available_image.png";

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->id_role == 1) {
                return $next($request);
            } else {
                return redirect("admin/login")
                    ->with("notification", config($this->PATH_CONFIG_CONSTANT . ".notification.not_permission"));
            }
        } else {
            return redirect("admin/login")
                ->with("error", config($this->PATH_CONFIG_CONSTANT . ".error.wrong_login"));
        }
    }
}
