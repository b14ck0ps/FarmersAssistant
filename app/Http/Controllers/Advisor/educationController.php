<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\education_qualifications;
use App\Models\education_qualification;

class educationController extends Controller
{
    public function Education()
    {
        return view('auth.Advisors.education');
    }
    public function Insertedu(Request $request)
    {
        // dd($request->all());

        $usetable = new education_qualifications();

        $usetable->institution = $request->institution;
        $usetable->graduate_at= $request->graduate_at;
        $usetable->added_at = $request->added_at;
        $usetable->advisor_id = $request->advisor_id;
        $usetable->save();
        return back();
    }



    public function showqualification(){

        $data=education_qualification::all();


        return view('showqalification',['qualifications'=>$data]);
    }
    public function deletequalification($id){

        $data=education_qualification::find($id);
        $data->delete();
        return redirect('/list');



    }

    public function ShowData($id)
    {
        $data=education_qualification::find($id);
        return view('editqalification',['data'=>$data]);
        return redirect('/edit');
        // return education_qualification::find($id);



    }
    public function Update(Request $req)
    {
        // return $req->input();
        $data=education_qualification::find($req->id);
        $data->institution = $req->institution;
        $data->graduate_at= $req->graduate_at;
        $data->added_at = $req->added_at;
        $data->advisor_id = $req->advisor_id;
        $data->save();
        return redirect('/list');

    }


}
