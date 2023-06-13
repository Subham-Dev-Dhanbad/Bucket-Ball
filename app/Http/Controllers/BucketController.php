<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\bucket;
use App\Models\track;
use Validator;

class BucketController extends Controller
{
    //
    function __construct(){
        view()->share('layout', 'layouts.master');
    }

    public function index()
    {
        $data['buckets'] = bucket::orderBy('id', 'DESC')->get();
        return view('bucket.list', $data);
    }

    public function addNew()
    {
        # code...
        return view('bucket.add');
    }

    public function store(Request $request)
    {
        # validating the rquest
        $inputs = $request->all();
        $this->validate($request,[
            "bucket_name"=> "required|unique:App\Models\bucket,name",
            "bucket_volume"=>  "required"
        ]);
        DB::beginTransaction();
        try{
            if(bucket::count() > 0){
                foreach(bucket::all() as $bk){
                    $bk->filed_volume = 0;
                    $bk->empty_volume = $bk->volume;
                    $bk->update();
                    track::where('bucket_id', $bk->id)->delete();
                }
            }
            $buck = new bucket;
            $buck->name = $request->bucket_name;
            $buck->volume = $request->bucket_volume;
            $buck->empty_volume = $request->bucket_volume;
            $buck->filed_volume = 0;
            $buck->save();
            DB::commit();
            $request->session()->flash('success', 'Bucket Added Successful!..');
            return redirect(route('bucket.list'));
        }catch(\Exception $e){
            DB::rollBack();
            $request->session()->flash('error', 'Something went Wrong!..');
            return redirect(route('bucket.add'));
        }
    }
}
