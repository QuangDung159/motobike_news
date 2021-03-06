<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::info("ClientMiddleware");
        if (Auth::check()) {
            if ($request->fullUrl() == "http://localhost/motobike_news/public/login_user"
                || $request->fullUrl() == "http://localhost/motobike_news/public/register_user") {
                return redirect("home");
            } else {
                $user = Auth::user();
                View::share("current_user", $user);
            }
        }
        return $next($request);
    }
}