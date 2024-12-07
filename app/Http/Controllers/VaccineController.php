<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VaccineController extends Controller
{
    public function get_allVaccine($userID){
        $vaccines = Vaccine::all();
        return view('pages.pricing',compact('vaccines'));
    }

    public function index(){
        $vaccines = Vaccine::all();
        return view('pages.pricing',compact('vaccines'));

    }
        public function edit(Vaccine $id)
        {
            $vaccines = Vaccine::all();
            return view('pages.edit_price', compact('vaccines','id'));
        }
    
        public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric',  // Ensure the price is required and is a valid number
        ]);
    
        $vaccine = Vaccine::findOrFail($id);
    
        $vaccine->price = $request->input('price');
    
        $vaccine->save();
    
        return redirect()->route('vaccine.index', $vaccine->id)->with('success', 'Price updated successfully!');
    }
}
