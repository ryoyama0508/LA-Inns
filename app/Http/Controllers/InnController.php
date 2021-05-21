<?php

namespace App\Http\Controllers;

use App\Inn;
use Illuminate\Http\Request;
use DB;

class InnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inn_index',['inns'=>[]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inn = new Inn;
        return view( 'inn_create', [ 'inn' => $inn ] );
    }

    public function createConfirm( Request $request )
    {
        $inn = new Inn;
        $inn->name = $request->name;
        $inn->address = $request->address;
        $inn->rooms = $request->rooms;
        $inn->checkin = $request->checkin;
        $inn->checkout = $request->checkout;
        return view( 'inn_create_confirm', [ 'inn' => $inn ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inn = $request->inns()->create( $request->all() );
        return view( 'inn_create_confirm', [ 'inn', $inn ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inn  $inn
     * @return \Illuminate\Http\Response
     */
    public function show(Inn $inn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inn  $inn
     * @return \Illuminate\Http\Response
     */
    public function edit(Inn $inn)
    {
        return view( 'user_edit', [ 'user' => Inn::findOrFail($inn->id) ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inn  $inn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inn $inn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inn  $inn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inn $inn)
    {
        Inn::findOrFail($inn->id)->delete();
        return redirect( route( 'inns.index' ) );
    }


    public function search(Request $request){
        $inns = Inn::where('name','LIKE', "%$request->name%")->get();
        return view('inn_index', ['inns' => $inns]);
    }

    public function changeInfo(Inn $inn){
        $inn = Inn::where('id','=', "$inn->id")->get();
        return view('inn_change_info', ['inn' => $inn]);
    }
}
