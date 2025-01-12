<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function show($slug)
    {
        $calculator = Calculator::where('slug', $slug)->first();

        if (!$calculator) {
            return abort(404);
        }

        return view('front.calculators.show', compact('calculator'));
    }
}
