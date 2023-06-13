<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\bucket;
use App\Models\ball;
use App\Models\track;
use Validator;


class TrackController extends Controller
{
    //
    function __construct(){
        view()->share('layout', 'layouts.master');
    }

    public function index($id = null)
    {
        if($id != null){
            $data['list'] = track::where('bucket_id', $id)->orderBy('id', 'DESC')->get();
        }else{
            $data['list'] = track::orderBy('id', 'DESC')->get();
        }
        
        return view('assgin.index', $data);
    }

    public function add()
    {
        $data['buckets'] = bucket::all();
        $data['balls'] = ball::all();
        return view('assgin.add', $data);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bucket' => 'required',
            'ball' => 'required',
            'number_of_balls' => 'required|numeric|gt:0'
        ]);

        $buck = bucket::find($request->bucket);
        $bal = ball::find($request->ball);



        //check first condition bucket empty volume must not less than  or equals 0
        if($buck->empty_volume > 0){
            //calculating the volume user want to insert inside the bucket
            $user_balls_volume = $bal->volume*$request->number_of_balls;

            if( $user_balls_volume > $buck->empty_volume ){
                //check for partial placement
                //get the possible no.
                $partial_no_balls = (int) floor( $buck->empty_volume / $bal->volume);
                $partial_volume = $partial_no_balls*$bal->volume;

                if($partial_no_balls > 0){
                    $final_empty_vol = $buck->empty_volume - $partial_volume;
                    $final_field_vol = $buck->filed_volume + $partial_volume;
                    //do the transactions
                    DB::beginTransaction();
                    //place the ball inside the bucket
                    try{
                        $tracer = new track;
                        $tracer->bucket_id = $buck->id;
                        $tracer->ball = $bal->name;
                        $tracer->no_balls = $partial_no_balls;
                        $tracer->total_volume = $partial_volume;
                        $tracer->attemped_balls = $request->number_of_balls;
                        $tracer->save();

                        //update the bucket empty volume
                        $buck->empty_volume = $final_empty_vol;
                        $buck->filed_volume = $final_field_vol;
                        $buck->update();

                        DB::commit();
                        $request->session()->flash('success', 'Balls added to bucket Successful but partialy!..');
                        return redirect(route('balls.assgin.list'));
                    }catch (\Exception $e){
                        DB::rollBack();
                        $request->session()->flash('error', 'Something went Wrong!..');
                        return redirect(route('balls.assgin.add'));
                    }
                }else{
                    $request->session()->flash('error', 'Sorry! empty volume is not enough to place the ball.');
                    return redirect(route('balls.assgin.add'));
                }
            }else{
                $final_empty_vol = $buck->empty_volume - $user_balls_volume;
                $final_field_vol = $buck->filed_volume + $user_balls_volume;
                DB::beginTransaction();
                //place the ball inside the bucket
                try{
                    $tracer = new track;
                    $tracer->bucket_id = $buck->id;
                    $tracer->ball = $bal->name;
                    $tracer->no_balls = $request->number_of_balls;
                    $tracer->total_volume = $user_balls_volume;
                    $tracer->attemped_balls = $request->number_of_balls;
                    $tracer->save();

                    //update the bucket empty volume
                    $buck->empty_volume = $final_empty_vol;
                    $buck->filed_volume = $final_field_vol;
                    $buck->update();

                    DB::commit();
                    $request->session()->flash('success', 'Balls added to bucket Successful!..');
                    return redirect(route('balls.assgin.list'));

                }catch (\Exception $e){
                    DB::rollBack();
                    $request->session()->flash('error', 'Something went Wrong!..');
                    return redirect(route('balls.assgin.add'));
                }


            }

        }else{
            $request->session()->flash('error', "Can't add ball to bucket. Bucket Empty Volume is 0.");
            return redirect(route('balls.assgin.add'));
        }




        dd($bal);

    }
}
