<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use App\Models\UserFaciasCalculation;
use App\Models\UserFlatRoofCalculation;
use App\Models\UserSheetRockCalculation;
use Illuminate\Http\Request;

class MemoryCalculationController extends Controller
{
    public function index(){

        $calculations=UserSheetRockCalculation::where('user_id',auth()->id())->latest()->get();

        return view('front.memory-calculations.index',compact('calculations'));
    }


    public function facias(){

        $calculations=UserFaciasCalculation::where('user_id',auth()->id())->latest()->get();

        return view('front.memory-calculations.facias',compact('calculations'));
    }

    public function flatRoof(){

        $calculations=UserFlatRoofCalculation::where('user_id',auth()->id())->latest()->get();

        return view('front.memory-calculations.flat-roof',compact('calculations'));
    }
}
