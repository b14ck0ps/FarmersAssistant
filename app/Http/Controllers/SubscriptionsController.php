<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('subscriptions.index', compact('plans'));
    }
}
