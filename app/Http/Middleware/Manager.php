<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Manager
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->manager_id == null) {
            return $next($request);
        }

        return redirect()->route('employee_task.index');
    }
}
