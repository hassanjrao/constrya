<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()
        ->with(['plan'])
        ->whereHas('roles',function($q){
            $q->where('name','user');
        })
        ->get();

        return view('admin.users.index',compact('users'));
    }

    public function updateSubscription(Request $request){
        $request->validate([
            'user_id'=>'required|exists:users,id',
        ]);

        $user=User::find($request->user_id);

        if($user->subscribed_at)
        {
            $user->update([
                'subscribed_at'=>null,
                'subcription_expired_at'=>null,
                'subscribed_by_admin'=>0
            ]);
        }else{
            $user->update([
                'subscribed_at'=>now(),
                'subcription_expired_at'=>now()->addYear(),
                'subscribed_by_admin'=>1
            ]);
        }


        return redirect()->back()->withToastSuccess('Subscription updated successfully');

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
