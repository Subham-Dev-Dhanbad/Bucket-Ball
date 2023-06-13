<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ball;
use App\Models\bucket;
use App\Models\track;
use Validator;

class BallController extends Controller
{
    function __construct(){
        view()->share('layout', 'layouts.master');
    }

    public function index()
    {
        $data['balls'] = ball::orderBy('id', 'DESC')->get();
        return view('ball.index', $data);
    }
    public function add()
    {
        return view('ball.add');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->validate($request,[
            "ball_name"=> "required|unique:App\Models\ball,name",
            "ball_volume"=>  "required"
        ]);

        DB::beginTransaction();
        try{
            if(bucket::count() > 0){
                foreach(bucket::all() as $bk){
                    $bk->filed_volume = 0;
                    $bk->empty_volume = $bk->volume;
                    $bk->update();
                    
                }
                track::truncate();
            }
            
            $bal = new ball;
            $bal->name = $request->ball_name;
            $bal->volume = $request->ball_volume;
            $bal->save();
            DB::commit();
            $request->session()->flash('success', 'Ball Added Successful!..');
            return redirect(route('ball.list'));
        }catch(\Exception $e){
            DB::rollBack();
            $request->session()->flash('error', 'Something went Wrong!..');
            return redirect(route('ball.add'));
        }
    }
}
