<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function get_allVaccine($userID){
        $vaccines = Vaccine::all();
        return view('pages.pricing',compact('vaccines'));
    }
}
