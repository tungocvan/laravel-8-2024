<?php
namespace Modules\Thuoc\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class Thuoc
{
    public function handle(Request $request, Closure $next)
    {                
        if(\Cache::get('auth-my')){       
            return $next($request);
       }        
       
       return  redirect('/thuoc/login');
    }
}
 