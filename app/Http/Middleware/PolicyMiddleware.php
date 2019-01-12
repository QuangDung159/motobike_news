<?php

namespace App\Http\Middleware;

use App\Models\Entity;
use App\Models\Policy;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
//    private $DIRECTORY_PAGE_ADMIN_SLIDE = "pages.admin.slide";
//    private $DIRECTORY_PAGE_ADMIN_DASHBOARD = "pages.admin.dashboard";

    // use for redirect()
//    private $URL_PAGE_ADMIN_SLIDE_ADD = "admin/slide/add";
//    private $URL_PAGE_ADMIN_SLIDE_LIST = "admin/slide/list";
//    private $URL_PAGE_ADMIN_SLIDE_UPDATE = "admin/slide/update";
    private $URL_PAGE_ADMIN_DASHBOARD = "admin/dashboard";

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
                foreach ($list_entity as $entity) {

                    // url : http://localhost:8090/motobike_news/public/admin/slide/list
                    // Check whether the segment(3) - slide - belongs to the entity list or not

                    // Dashboard isn't belongs to entity list -> this is exception -> bypass
                    if ($request->segment(2) == "dashboard") {
                        return $next($request);
                    }

                    // Info isn't belongs to entity list -> this is exception -> bypass
                    if ($request->segment(2) == "info") {
                        return $next($request);
                    }
                    if ($entity->alias == $request->segment(2)) {

                        // Get list activity by id_role, id_entity
                        $list_activity = DB::select("SELECT r.name as role_name, e.name as entity_name, a.name as acitvity_name 
                                                      FROM policy p, entity e, activity a, role r 
                                                      WHERE p.id_activity = a.id and p.id_entity = e.id 
                                                      and p.id_role = r.id and p.id_role = " . $user->id_role . " and p.id_entity = " . $entity->id);
                        Log::info(strtolower($request->segment(3)));
                        foreach ($list_activity as $activity) {
                            if (strtolower($activity->acitvity_name) == strtolower($request->segment(3))) {
                                return $next($request);
                            }
                        }

                    }
                }
                return redirect($this->URL_PAGE_ADMIN_DASHBOARD)
                    ->with("notification", config($this->PATH_CONFIG_CONSTANT . ".notification.no_permission"));
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


//SELECT r.name as role_name, e.name as entity_name, a.name as acitvity_name FROM policy p, entity e, activity a, role r WHERE p.id_activity = a.id and p.id_entity = e.id and p.id_role = r.id and p.id_role = 1 and p.id_activity = 1 and p.id_entity = 1
//
//SELECT r.name as role_name, e.name as entity_name, a.name as acitvity_name FROM policy p, entity e, activity a, role r WHERE p.id_activity = a.id and p.id_entity = e.id and p.id_role = r.id and p.id_role = 1 and p.id_entity = 1