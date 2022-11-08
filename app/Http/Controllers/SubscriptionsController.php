<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscriptions;
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
        $user = auth()->user();
        Subscriptions::create([
            'status' => 1,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'farmer_id' => session('user_id'),
            'plan_id' => $id,
        ]);

        return redirect()->route('farmers.dashboard');
    }
}
