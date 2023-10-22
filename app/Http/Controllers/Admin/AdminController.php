<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    /**
     * Dashboard
     *
     * @return void
     */
    public function dashboard() {
        return view( 'admin.dashboard' );
    }

    /**
     * Admin Logout
     *
     * @return void
     */
    public function logout() {
        if ( Auth::check() && Auth::user()->role === 1 ) {
            Auth::logout();
        }
        return redirect()->route( 'login' );
    }

}
