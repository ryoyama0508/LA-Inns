<?php

namespace App\Http\Controllers;

use App\Inn;
use App\Plan;
use Illuminate\Support\Facades\File;
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
        return view('inn_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inn = new Inn;
        $inn->name = $request->name;
        $inn->address = $request->address;
        $inn->rooms = $request->rooms;
        $inn->checkin = $request->checkin;
        $inn->checkout = $request->checkout;
        $inn->pic_path = base64_encode(file_get_contents($request->image));
        $inn->save();

        if( isset($request->all()['plans']) ){
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
        
        return redirect( route( 'inns.index' ) );
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
        $plans = Plan::where('inn_id', $inn->id)->get();
        return view( 'inn_edit', [ 'inn' => Inn::findOrFail($inn->id) ], [ 'plans' => $plans ]);
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
        if( file_get_contents($request->image) ){// 新しい写真を追加してある場合、
            if( isset($inn->pic_path) ){// 以前の写真を消すようにする
                if(File::exists($inn->pic_path)) {
                    File::delete($inn->pic_path);
                }
            }
            $inn->pic_path = base64_encode(file_get_contents($request->image));
        }

        if( isset($inn->pic_path) ){
            if(File::exists($inn->pic_path)) {
                File::delete($inn->pic_path);
            }
        }

        if( isset($request->name) ) $inn->name = $request->name;
        if( isset($request->address) ) $inn->address = $request->address;
        if( isset($request->rooms) ) $inn->rooms = $request->rooms;
        $inn->save();

        $plans = Plan::where('inn_id', $inn->id)->get();
        foreach ($plans as $plan) {
            Plan::findOrFail($plan->id)->delete();
        }

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
        return redirect( route( 'inns.index' ) );
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


    public function search(Request $request)
    {
        $inns = Inn::where('name','LIKE', "%$request->name%")->get();
        return view('inn_index', ['inns' => $inns]);
    }

    public function changeInfo(Inn $inn)
    {
        $inn = Inn::where('id','=', "$inn->id")->get();
        return view('inn_change_info', ['inn' => $inn]);
    }

    public function backFromPlanCreate(Request $request)
    {
        if( isset($request->all()['plans']) ){
            $plans = $request->all()['plans'];
            return view('inn_create', ['plans' => $plans]);
        }else{
            return view('inn_create', []);
        }
    }
}
