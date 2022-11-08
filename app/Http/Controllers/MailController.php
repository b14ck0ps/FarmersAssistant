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
        $this->validate(
            $request,
            [
                'subject' => 'required | string | max:100',
                'body' => 'required | string | max:1000',
                'advisor_id' => 'required | integer',
            ],
            [
                'subject.required' => 'Subject is required',
                'subject.string' => 'Subject must be a string',
                'subject.max' => 'Subject must be less than 100 characters',
                'body.required' => 'Body is required',
                'body.string' => 'Body must be a string',
                'body.max' => 'Body must be less than 1000 characters',
                'advisor_id.required' => 'Advisor is required',
                'advisor_id.integer' => 'Select an advisor',
            ]
        );

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
    //search email by subject
    public function searchMails(Request $request)
    {
        $this->validate($request, [
            'search' => 'required | string | max:100',
        ]);
        $mails_serarched = Mails::where('subject', 'like', '%' . $request->search . '%')->where('farmer_id', session('user_id'))->get();
        $mails_serarched->map(function ($mail) {
            $mail->advisor_name = User::find(Advisors::find($mail->advisor_id)->first()->user_id)->getFullName();
            return $mail;
        });
        $request->session()->put('user_mails', $mails_serarched);
        return redirect()->back();
    }
    //deleteMail
    public function deleteMail($id)
    {
        Mails::find($id)->delete();
        return redirect('/profile')->with('success', 'Mail deleted successfully');
    }
}
