<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class CheckRole
{
	    public function handle(Request $request, Closure $next, ...$roles)
		        {
				        
				        if (!auth()->check() || !in_array(auth()->user()->level, $roles)) {
						return redirect('/login');
						}
					        return $next($request);
					    }
}
