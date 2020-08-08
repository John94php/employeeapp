<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use App\Contract;
use Illuminate\Support\Facades\Auth;
class AttendanceController extends Controller
{
    //
    function index() {
        $id = Auth::user()->id;
            $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
        return view('attendance',['person'=>$person])->with('title','Lista obecności');
    }
    function attendance(Request $req) {
        echo "Obecność zgłoszona. <a href='/welcomelog'>Powrót</a>";
            $data = new Attendance;
            $data->fname = $req->fname;
            $data->currentDate = $req->currentDate;
            $data->startHour = $req->startHour;

            $data->endHour = $req->endHour;
            $data->comment = $req->comment;
            $data->id_contract = $req->id_contract;
            $data->save();

    }
}
