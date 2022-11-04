<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mails;
use Illuminate\Http\Request;
use App\Models\Users\Advisors;
use Illuminate\Support\Facades\Auth;

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
        $this->validate($request, [
            'subject' => 'required | string | max:100',
            'body' => 'required | string | max:1000',
            'advisor_id' => 'required | integer',
        ]);

        Mails::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'advisor_id' => $request->advisor_id,
            'farmer_id' => session('user_id'),
        ]);
        return redirect()->back()->with('success', 'Mail sent successfully');
    }
    public function view($id)
    {
        $mail = Mails::find($id);
        $advisor = User::find(Advisors::find($mail->advisor_id)->user_id);
        return view('mail.farmerViewMail', compact('mail', 'advisor'));
    }
}