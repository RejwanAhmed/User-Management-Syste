<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    /**
     * To show login form
     *
     * @return view
     */
    public function index() {
        return view( 'login' );
    }

    /**
     * Login Authentication
     * Redirection based on role.
     * If role = 0 redirect to user dashboard. If role = 1 redirect to admin dashboard
     * @param Request $request
     * @return void
     */
    public function login( Request $request ) {
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ] );
        $credentials = $request->only( 'email', 'password' );


        $remember = $request->has('remember');

        // Login credentials checking
        if ( Auth::attempt( $credentials, $remember ) ) {
            $user = Auth::user();
            if ( $user->role == 1 ) {
                return redirect()->route( 'admin.dashboard' );
            } else if ( $user->role == 0 ) {
                return redirect()->route( 'user.dashboard' );
            }
        }
        // If login fails
        return redirect()->route( 'login' )->with( 'msg', 'Login Credentials Does Not Match!!' );
    }

}
