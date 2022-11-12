<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Replies;
class RepliesController extends Controller
{
    public function Replies()
    {
        return view('auth.Advisors.replies');
    }
    public function reply(Request $request)
    {
        $usetable = new Replies();
        $usetable->created_at = $request->created_at;
        $usetable->tittle= $request->tittle;
        $usetable->body = $request->body;
        $usetable->mails_id = $request->mails_id;
        $usetable->advisor_id = $request->advisor_id;
        $usetable->save();
        return back();
        // dd($request->all());
    }

    public function showReplies(){

        $data=Replies::all();


        return view('showreplies',['replie'=>$data]);
    }

    public function deleteReplies($id){

        $data=Replies::find($id);
        $data->delete();
        return redirect('/list2');
    }

    public function ShowReply($id)
    {
        $data=Replies::find($id);
        return view('editReplies',['data'=>$data]);
        return redirect('edit2');
        // return education_qualification::find($id);



    }

    public function RepliesUpdate(Request $req)
    {
        // return $req->input();
        $data=Replies::find($req->id);
        $data->created_at = $req->created_at;
        $data->tittle= $req->tittle;
        $data->body = $req->body;
        $data->mails_id= $req->mails_id;
        $data->advisor_id = $req->advisor_id;
        $data->save();
        return redirect('/list2');

    }


}
