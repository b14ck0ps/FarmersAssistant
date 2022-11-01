<?php

namespace App\Http\Controllers\Auth\Farmers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmerProfileController extends Controller
{
    public function showProfile()
    {
        return view('dashboards.farmers');
    }

    public function showProfileEdit()
    {
        return view('dashboards.editProfile');
    }
}
