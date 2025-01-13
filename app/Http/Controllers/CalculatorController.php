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

        $calculatorView= $calculator->view;

        return view($calculatorView, compact('calculator'));
    }
}
