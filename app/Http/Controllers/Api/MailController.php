<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Mails;
use Illuminate\Http\Request;
use App\Models\Users\Advisors;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $user = auth('sanctum')->user();
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
            'farmer_id' => $user->farmers->first()->id,
        ]);
        return response()->json(['success' => 'Mail sent successfully']);
    }
    public function mails($id)
    {
        $mail = Mails::find($id);
        $advisor = User::find(Advisors::find($mail->advisor_id)->user_id);
        return response()->json(['mail' => $mail, 'advisor' => $advisor]);
    }
    public function searchMails(Request $request)
    {
        $user = auth('sanctum')->user();
        $this->validate($request, [
            'search' => 'required | string | max:100',
        ]);
        $mails_serarched = Mails::where('subject', 'like', '%' . $request->search . '%')->where('farmer_id', $user->farmers->first()->id)->get();
        $mails_serarched->map(function ($mail) {
            $mail->advisor_name = User::find(Advisors::find($mail->advisor_id)->first()->user_id)->getFullName();
            return $mail;
        });
        return response()->json(['mails' => $mails_serarched]);
    }
    //deleteMail
    public function deleteMail($id)
    {
        Mails::find($id)->delete();
        return response()->json(['success' => 'Mail deleted successfully']);
    }
}
