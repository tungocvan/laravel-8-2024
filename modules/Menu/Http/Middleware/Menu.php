<?php
namespace Modules\Menu\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class Menu
{
    public function handle(Request $request, Closure $next)
    {
        echo "<h2>middleware Menu</h2>";
        return $next($request);
    }
}
