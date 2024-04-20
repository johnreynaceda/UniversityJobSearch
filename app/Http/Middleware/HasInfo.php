<?php

namespace App\Http\Middleware;

use App\Models\UserInformation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $data = UserInformation::where('user_id', auth()->user()->id)->get();
       if ($data->count() > 0) {
        return $next($request);

       }else{
        return redirect()->route('user.profile');
       }
    }
}
