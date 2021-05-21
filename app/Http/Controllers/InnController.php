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
        return view( 'inn_create' );
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
        //
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
        //
    }


    public function search(Request $request){
        $search = $request->input("search");
        $inns = DB::table('inns')->where('name','LIKE', "%{$search}%")->get();
        return view('inn_index', ['inns' => $inns]);
    }
}
