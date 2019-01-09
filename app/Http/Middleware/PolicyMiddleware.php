<?php

namespace App\Http\Middleware;

use App\Models\Entity;
use App\Models\Policy;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use MongoDB\Driver\Query;

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
            View::share("current_user", $user);
            if ($user->id_role != 4) {
                $list_entity = DB::select("select DISTINCT(id_entity), e.* from policy p, entity e where p.id_role = "
                    . $user->id_role
                    . " and e.id = p.id_entity");
                View::share("list_entity", $list_entity);
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
