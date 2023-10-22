<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * To show all users
     *
     * @return view
     */
    public function showUser() {
        $users = User::paginate( 7 );
        $data = compact( 'users' );
        return view( 'admin.allUser' )->with( $data );
    }

    /**
     * User Registration Form
     * Compact route and title and send it to the blade.
     * @return view
     */
    public function create() {
        $url = route( 'admin.user.store' );
        $title = "Add New User";
        $data = compact( 'url', 'title' );
        return view( 'admin.userRegistration' )->with( $data );
    }

    /**
     * Store User Data
     *
     * @param Request $request
     * @return void
     */
    public function store( Request $request ) {
        $request->validate( [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
        ] );

        $user = new User;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make( '123456789' );
        $user->save();
        return redirect()->route( 'admin.showUser' )->with( 'msg', 'New User Registered!!' );
    }

    /**
     * Show edit form for user update
     *
     * @param [type] $id
     * @return void
     */
    public function edit( $id ) {
        $user = User::find( $id );

        if ( !is_null( $user ) ) {
            $url = route( 'admin.user.update', ['id' => $id] );
            $title = "Update User";
            $data = compact( 'user', 'url', 'title' );
            return view( 'admin.userRegistration' )->with( $data );
        } else {
            return redirect()->route( 'admin.showUser' )->with( 'msg', "User Not Found" );
        }

    }

    /**
     * Update User Information
     *
     * @param Request $request
     * @param [type] $id
     * @return view
     */
    public function update( Request $request, $id ) {
        $user = User::find( $id );
        $request->validate( [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ] );

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->save();
        return redirect()->route( 'admin.showUser' )->with( 'msg', 'User Updated Successfully!!' );
    }

    /**
     * User Delete
     *
     * @param [type] $id
     * @return view
     */
    public function delete( $id ) {
        $user = User::find( $id );

        if ( !is_null( $user ) ) {
            $user->delete();
            return redirect()->route( 'admin.showUser' )->with( 'msg', 'User Deleted Successfully!!' );
        } else {
            return redirect()->route( 'admin.showUser' )->with( 'msg', 'User Not Found' );
        }
    }
}
