<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class ProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!empty(Auth::user()->email) && empty(Auth::user()->mobile) && empty(Auth::user()->email_verified_at))
            return redirect()->route('customer.sales-process.profile-completion');

        if (empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->national_code))
            return redirect()->route('customer.sales-process.profile-completion');

        if (!empty(Auth::user()->mobile) && empty(Auth::user()->email) && empty(Auth::user()->movile_verified_at))
            return redirect()->route('customer.sales-process.profile-completion');
        return $next($request);
    }
}
