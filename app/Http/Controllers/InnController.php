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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'rooms' => 'integer|required',
            'checkin' => 'integer|required|min:0, max:24',
            'checkout' => 'integer|required|min:0, max:24',
            'image' => 'required',
            'plans' => 'required',
        ]);
        $inn = new Inn;
        $inn->name = $validated['name'];
        $inn->address = $validated['address'];
        $inn->rooms = $validated['rooms'];
        $inn->checkin = $validated['checkin'];
        $inn->checkout = $validated['checkout'];
        $inn->pic_path = base64_encode(file_get_contents($validated['image']));
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
        $validated = $request->validate([
            'name' => 'max:50',
            'address' => '',
            'rooms' => 'integer|min:0',
            'checkin' => 'integer|min:0, max:24',
            'checkout' => 'integer|min:0, max:24',
            'image' => '',
            'plans' => '',
        ]);

        if ( isset($validated['image']) ){
            if( file_get_contents($validated['image']) ){// 新しい写真を追加してある場合、
                if( isset($inn->pic_path) ){// 以前の写真を消すようにする
                    if(File::exists($inn->pic_path)) {
                        File::delete($inn->pic_path);
                    }
                }
                $inn->pic_path = base64_encode(file_get_contents($validated['image']));
            }
        }

        if( isset($inn->pic_path) ){
            if(File::exists($inn->pic_path)) {
                File::delete($inn->pic_path);
            }
        }

        if( isset($validated['name']) ) $inn->name = $validated['name'];
        if( isset($validated['address']) ) $inn->address = $validated['address'];
        if( isset($validated['rooms']) ) $inn->rooms = $validated['rooms'];
        if( isset($validated['checkin']) ) $inn->checkin = $validated['checkin'];
        if( isset($validated['checkout']) ) $inn->checkout = $validated['checkout'];
        $inn->save();

        $plans = Plan::where('inn_id', $inn->id)->get();
        foreach ($plans as $plan) {
            Plan::findOrFail($plan->id)->delete();
        }

        app('App\Http\Controllers\PlanController')->store($request, $inn);

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
