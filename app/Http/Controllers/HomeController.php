<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $calculator = Calculator::where('slug', 'sheetrock')->first();

        if (!$calculator) {
            return abort(404);
        }

        $calculatorView= $calculator->view;

        return view($calculatorView, compact('calculator'));
      
    }
}
