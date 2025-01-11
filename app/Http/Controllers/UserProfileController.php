<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();


        return view('front.user.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function cancelSubscription(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);



        $user = User::findOrFail(decrypt($request->user_id));

        // $payPalClient = new PayPalClient();

        // $provider = \PayPal::setProvider();


        // $subscription = $provider->showSubscriptionDetails($user->subscription_id);

        // if ($subscription['status'] == 'ACTIVE') {
        //     // Cancel the subscription
        //     $response = $provider->cancelSubscription($user->subscription_id);

        //     if ($response['status'] == 'CANCELLED') {
        //         return redirect()->back()->withToastSuccess("__('Subscription cancelled successfully.')");
        //     } else {
        //         return redirect()->back()->withToastError("__('Failed to cancel subscription.')");
        //     }
        // }


        return redirect()->back()->withToastSuccess('Subscription cancelled successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'new_password' => 'nullable|string|min:8',
            'current_password' => 'required_with:new_password',
        ]);

        $user = User::findOrFail($id);

        if($request->new_password) {
            if(!\Hash::check($request->current_password,auth()->user()->password)){
                return back()->withErrors(['current_password'=>'Current password is incorrect']);
            }
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profession' => $request->profession,
        ]);

        if($request->new_password) {
            $user->update([
                'password' => bcrypt($request->new_password),
            ]);
        }

        return redirect()->back()->withToastSuccess('Profile updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
