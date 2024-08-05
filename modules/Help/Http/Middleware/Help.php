<?php
namespace Modules\Help\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class Help
{
    public function handle(Request $request, Closure $next)
    {
        echo "<h2>middleware Help</h2>";
        return $next($request);
    }
}
