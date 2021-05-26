<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Inn;
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
    public function store(Request $request, Inn $inn)
    {
        if(isset($request->all()['plans'])){
            $plans = $request->all()['plans'];
            foreach ($plans as $tmp_plan) {
                $assocArrayPlan = json_decode($tmp_plan, true);
                $plan = new Plan;
                $plan->inn_id = $inn->id;

                $plan->name = $assocArrayPlan['name'];
                $plan->content = $assocArrayPlan['content'];
                $plan->price = $assocArrayPlan['price'];
                
                $plan->save();
            }
        }
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
        return view('plan_edit', ['plan' =>Plan::findOrFail($plan->id)]);
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

    public function planCreate(Request $request){
        if( isset($request->all()['plans']) ){
            $plans = $request->all()['plans'];//array
            return view('plan_create', ['plans' => $plans]);
        }else{
            return view('plan_create', ['plans'=>[]]);
        }
    }

    public function append(Request $request){
        $plans = array();
        if (isset($request->all()['plans'])){
            $strPlans = $request->all()['plans'];
            
            foreach ($strPlans as $strPlan) {
                $assocArrayPlan = json_decode($strPlan, true);
                
                $plan = new Plan;
                if( isset($assocArrayPlan['name']) ) {
                    $plan->name = $assocArrayPlan['name'];
                }
        
                if( isset($assocArrayPlan['content']) ) {
                    $plan->content = $assocArrayPlan['content'];
                }
        
                if( isset($assocArrayPlan['price']) ) {
                    $plan->price = $assocArrayPlan['price'];
                }
                $plans[] = $plan;
            }
        }
        $plan = new Plan;
        if( isset($request->name) ) {
            $plan->name = $request->name;
        }

        if( isset($request->content) ) {
            $plan->content = $request->content;
        }

        if( isset($request->price) ) {
            $plan->price = $request->price;
        }

        $plans[] = $plan;
        return view( 'plan_index', ['plans' => $plans]);
    }


    public function createPlanFromEditInn(Request $request)
    {
        $inn = $request->all()['inn'];

        if( isset($request->all()['plans']) ){
            $plans = $request->all()['plans'];
            return view('plan_create_from_inn_edit',['inn' => $inn], ['plans' => $plans]);
        }else{

            return view('plan_create_from_inn_edit',['inn' => $inn], ['plans'=>[]]);
        }
    }

    public function appendFromEditInn(Request $request){
        $plans = array();
        if (isset($request->all()['plans'])){
            $strPlans = $request->all()['plans'];
            foreach ($strPlans as $strPlan) {
                $assocArrayPlan = json_decode($strPlan, true);
                
                $plan = new Plan;
                if( isset($assocArrayPlan['name']) ) {
                    $plan->name = $assocArrayPlan['name'];
                }
        
                if( isset($assocArrayPlan['content']) ) {
                    $plan->content = $assocArrayPlan['content'];
                }
        
                if( isset($assocArrayPlan['price']) ) {
                    $plan->price = $assocArrayPlan['price'];
                }
                $plans[] = $plan;
            }
        }
        $plan = new Plan;
        if( isset($request->name) ) {
            $plan->name = $request->name;
        }

        if( isset($request->content) ) {
            $plan->content = $request->content;
        }

        if( isset($request->price) ) {
            $plan->price = $request->price;
        }

        $plans[] = $plan;
        $assocArrayPlan = json_decode($request['inn'], true);
        return view( 'inn_edit',[ 'inn' => Inn::findOrFail($assocArrayPlan['id']) ], ['plans' => $plans]);
    }
}
