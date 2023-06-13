<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bucket;
use App\Models\ball;
use App\Models\track;

class DashboardController extends Controller
{
    //
    function __construct(){
        view()->share('layout', 'layouts.master');
    }
    //
    public function index(){
        $data['noBucket'] = bucket::count();
        $data['noBall'] = ball::count();
        $data['noTrack'] = track::count();
        return view('dashboard', $data);
    }
}
