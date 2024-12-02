<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    //
    public function get_allVaccine(){
        $v = Vaccine::all();
        dd($v);
        return view('home.home',['v'=>$v]);
    }
}
