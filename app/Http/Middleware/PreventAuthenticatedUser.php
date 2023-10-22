<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventAuthenticatedUser {
    /**
     * If user is loggedin redirect to its dashboard
     * Otherwise redirect to it's home page.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle( Request $request, Closure $next ): Response {

        if ( Auth::check() ) {
            if ( Auth::user()->role == 1 ) {
                return redirect()->route( 'admin.dashboard' );
            } else

            if ( Auth::user()->role == 0 ) {
                return redirect()->route( 'user.dashboard' );
            }
        }

        return $next( $request );
    }

}
