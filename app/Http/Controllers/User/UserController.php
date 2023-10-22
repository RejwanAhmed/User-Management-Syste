<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
     * User Dashboard
     *
     * @return void
     */
    public function dashboard() {
        return view( 'user.dashboard' );
    }

    /**
     * Admin Logout
     *
     * @return void
     */
    public function logout() {

        if ( Auth::check() && Auth::user()->role == 0 ) {
            Auth::logout();
        }

        return redirect()->route( 'login' );
    }

    /**
     * Show User Update Profile Page
     *
     * @return void
     */
    public function edit() {
        $user = Auth::user();
        $data = compact( 'user' );
        return view( 'user.profile' )->with( $data );
    }

    /**
     * Update Users Profile
     *
     * @param Request $request
     * @return void
     */
    public function update( Request $request ) {
        $user = Auth::user();
        // dd($user->id);
        $request->validate( [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:8',
        ] );

        DB::table( 'users' )
            ->where( 'id', $user->id )
            ->update( [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => Hash::make( $request->password ),
            ] );
        return redirect()->route( 'user.edit' )->with( 'msg', "{$user->firstName} Profile Updated Successfully!!" );
    }

}
