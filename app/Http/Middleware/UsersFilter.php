<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;

class UsersFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('id_user_roles') == 2) {
            // Jika user telah login, lanjutkan ke halaman yang dilindungi
            return $next($request);
        } else {
            // Jika user belum login, arahkan ke halaman login
            return redirect()->to(url()->previous());
        }
    }
}
