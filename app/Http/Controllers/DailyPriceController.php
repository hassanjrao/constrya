<?php

namespace App\Http\Controllers;

use App\Models\DailyPrice;
use Illuminate\Http\Request;

class DailyPriceController extends Controller
{
    public function update(Request $request){

        $request->validate([
            'precio' => 'required',
            'precio_materiales' => 'required',
            'precio_todo' => 'required'
        ]);

        DailyPrice::updateOrCreate([
            'id'=>1
        ],[
            'id'=>1,
            'precio' => $request->precio,
            'precio_materiales' => $request->precio_materiales,
            'precio_todo' => $request->precio_todo
        ]);


        return redirect()->back()->withToastSuccess('Updated Successfully');

    }
}
