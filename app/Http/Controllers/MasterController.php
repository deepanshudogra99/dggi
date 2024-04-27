<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function statemaster(){
        return view('Masters.statemaster');
    }

    public function districtmaster(){
        return view('Masters.districtmaster');
    }
}
    

