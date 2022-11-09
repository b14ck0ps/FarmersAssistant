<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscriptions;
use App\Models\Users\Farmers;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('subscriptions.index', compact('plans'));
    }

    public function subscribe($id)
    {
        $plan = Plan::find($id);
        Subscriptions::create([
            'status' => 1,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'farmer_id' => session('user_id'),
            'plan_id' => $id,
        ]);
        Farmers::where('id', session('user_id'))->update([
            'subscription' => 1,
        ]);
        session(['subs' => 1]);
        return redirect()->route('farmers.dashboard')->with('success', 'You have successfully subscribed to the ' . $plan->name . ' plan');
    }
}
