<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return view('front.plans.index', compact('plans'));
    }

    public function register($planId)
    {
        if(auth()->check()) {
            return redirect()->route('user.plans.pay', $planId);
        }

        $plan = Plan::findOrFail($planId);

        return view('auth.register', compact('plan'));
    }

    public function processRegister(Request $request, $planId)
    {
        $plan = Plan::findOrFail($planId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'profession' => $request->profession,
            'plan_id' => $plan->id,
        ]);

        $user->assignRole('user');

        auth()->login($user);

        return redirect()->route('user.plans.pay', $plan->id);
    }

    public function payView($planId)
    {
        if(auth()->user()->subscribed_at) {
            return redirect()->route('home')->withToastSuccess("__('Ya estás suscrito a un plan.')");
        }

        $plan = Plan::findOrFail($planId);

        return view('front.plans.pay', compact('plan'));
    }

    public function success(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|string',
        ]);
        auth()->user()->update([
            'subscribed_at' => now(),
            'subscription_id' => $request->subscription_id,
        ]);
        return redirect()->route('home')->withToastSuccess(__('Pago exitoso'));
    }
}
