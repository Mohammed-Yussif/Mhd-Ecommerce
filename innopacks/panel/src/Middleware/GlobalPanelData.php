<?php
 
namespace InnoShop\Panel\Middleware;

use Illuminate\Http\Request;

class GlobalPanelData
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, \Closure $next): mixed
    {
        $admin = current_admin();

        view()->share('current_panel_locale', current_panel_locale());
        view()->share('admin', $admin);

        return $next($request);
    }
}
