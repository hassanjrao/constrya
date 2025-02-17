<?php

namespace App\Http\Controllers;

use App\Services\PayPalService;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function createProduct(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|in:SERVICE,PHYSICAL',
            'category' => 'required|string',
        ]);


        try {
            $product = $this->paypalService->createProduct($request->all());
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function createPlan(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'billing_cycles' => 'required|array',
            'payment_preferences' => 'required|array',
        ]);

        try {
            $plan = $this->paypalService->createPlan($data);
            return response()->json($plan);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
