<?php

namespace App\Http\Middleware;

use App\Models\UserInformation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserStatus
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
           return $next($request);
        }else{
            return redirect()->route('login');
        }
    }

}
