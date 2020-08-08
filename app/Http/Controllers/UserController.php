<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contract;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function profile() {
        $id = Auth::user()->id;
            $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
        return view('profile',['person'=>$person])
        ->with('title','Mój profil');
    }
    
    
}
