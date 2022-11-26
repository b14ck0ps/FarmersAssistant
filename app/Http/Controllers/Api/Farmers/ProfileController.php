<?php

namespace App\Http\Controllers\Api\Farmers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Mails;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Models\Users\Advisors;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * farmersProfileData
     *
     * @return "farmers profile data via api"
     */
    public function farmersProfileData(Request $request)
    {
        //make a hased token for the user
        $user = auth('sanctum')->user();
        $farmers = $user->farmers->first();
        $mails = Mails::where('farmer_id', $farmers->id)->get();
        $mails->map(function ($mail) {
            $mail->advisor_name = User::find(Advisors::find($mail->advisor_id)->first()->user_id)->getFullName();
            return $mail;
        });
        $subscription = Subscriptions::where('farmer_id', $farmers->id)->first();
        $orders = Orders::where('farmer_id', $farmers->id)->get();
        if (isset($subscription)) {
            $sub_end = Carbon::now()->diffInDays(Carbon::parse($subscription->end_date));
            $plan = Plan::find($subscription->plan_id);
        }
        return response()->json([
            'user' => $user,
            'farmers' => $farmers,
            'subs' => $subscription,
            'sub_end' => $sub_end ?? null,
            'plan' => $plan ?? null,
            'orders' => $orders,
            'mails' => $mails,
        ], 200);
    }
}
