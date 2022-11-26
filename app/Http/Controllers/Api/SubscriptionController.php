<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use App\Models\Subscriptions;
use App\Models\Users\Farmers;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{

    public function getAllSubcriptionPlan()
    {
        $plans = Plan::all();
        return response()->json(['plans' => $plans]);
    }

    public function subscribe($id)
    {
        $user = auth('sanctum')->user();
        $plan = Plan::find($id);
        Subscriptions::create([
            'status' => 1,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'farmer_id' => $user->farmers->first()->id,
            'plan_id' => $id,
        ]);
        Farmers::where('id', $user->farmers->first()->id)->update([
            'subscription' => 1,
        ]);
        return response()->json(['success' => 'Subscription successful to ' . $plan->planName . ' plan', 'plan' => $plan]);
    }
}
