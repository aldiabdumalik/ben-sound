<?php

namespace App\Http\Middleware;

use App\Models\CompanyProfile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebsiteConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $comprof = CompanyProfile::find(1);

        View::share('comprof', $comprof);
        return $next($request);
    }
}
