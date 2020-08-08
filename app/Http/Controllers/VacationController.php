<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Vacation;
use App\Contract;
class VacationController extends Controller
{
    //
             public function index()
            {
                $id = Auth::user()->id;
                $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
               $data = Vacation::all()->where('id_contract','=',$id);
                return view('vacationlist',['person'=>$person])->with('title','Wnioski urlopowe')->with('data',$data);
            }
            public function save(Request $r) {
                echo "Wniosek złożony, oczekuje na rozpatrzenie. <a href='/welcomelog'>Powrót</a>";
                $data = new Vacation;
                $data->id_contract = $r->id_contract;
                $data->type_vacation = $r->type_vacation;
                $data->status_vacation = $r->status_vacation;
                $data->dateStart = $r->dateStart;
                $data->dateEnd = $r->dateEnd;
                $data->countDays = $r->countDays;
                $data->created_atVacation = $r->created_atVacation;
                $data->save();
            }

}

