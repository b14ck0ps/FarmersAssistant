<?php

namespace App\Http\Controllers;

use App\Models\Mails;
use App\Models\User;
use App\Models\Users\Advisors;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        $advisors = Advisors::all();
        //get full name
        $advisors->map(function ($advisor) {
            $advisor->full_name = User::find($advisor->user_id)->getFullName();
            return $advisor;
        });
        return view('mail.farmerInbox', compact('advisors'));
    }
    public function send(Request $request)
    {
        //dd($request->all(), auth()->user()->id);
        $this->validate($request, [
            'subject' => 'required | string | max:100',
            'body' => 'required | string | max:1000',
            'advisor_id' => 'required | integer',
        ]);

        Mails::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'advisor_id' => $request->advisor_id,
            'farmer_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('success', 'Mail sent successfully');
    }
}
