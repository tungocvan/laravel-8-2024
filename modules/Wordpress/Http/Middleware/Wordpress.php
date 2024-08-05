<?php
namespace Modules\Wordpress\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class Wordpress
{
    public function handle(Request $request, Closure $next)
    {
        echo "<h2>middleware Wordpress</h2>";
        return $next($request);
    }
}
