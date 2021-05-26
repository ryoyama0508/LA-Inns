<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( User $user )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find( $user->id );
        return view( 'user_edit', [ 'user' => $user ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'name' => 'max:255',
            'email' => 'email:rfc,dns',
            'password' => 'min:8',
        ]);
        $user = User::find( $id );
        if( isset($validated['name']) ) $user->name = $validated['name'];
        if( isset($validated['email']) ) $user->email = $validated['email'];
        if( isset($validated['password']) ) $user->password = $validated['password'];
        $user->save();
        return redirect( route( 'users.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find( $id )->delete();
        return redirect( route( 'users.index' ) );
    }

    public function search( Request $request ){
        $users = User::where( 'name', 'LIKE' , "%$request->name%" )->get();
        return view( 'user_index', [ 'users' => $users ] );
    }
}
