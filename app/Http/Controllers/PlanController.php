<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'plan_index', ['plans'=>[]]);
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
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }

    public function createOnePlan(Request $request){
        if( isset($request->all()['plans']) ){
            $plans = $request->all()['plans'];
            return view('plan_create', ['plans' => $plans]);
        }else{
            return view('plan_create', ['plans'=>[]]);
        }
    }

    public function append(Request $request){
        $plans = array();
        if (isset($request->all()['plans'])){
            $plans = $request->all()['plans'];
            foreach ($plans as $tmp_plan) {
                $plan = new Plan;
                if( isset($tmp_plan->name) ){
                    $plan->name = $tmp_plan->name;
                    $plans[] = $plan;
                } 
            }
        }
        $plan = new Plan;
        if( isset($request->name) ) $plan->name = $request->name;
        $plans[] = $plan;
        
        return view( 'plan_index', ['plans' => $plans]);
    }
}
