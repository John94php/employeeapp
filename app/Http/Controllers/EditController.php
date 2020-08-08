<?php

namespace App\Http\Controllers;
use App\User;
use App\Contract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class EditController extends Controller
{
    public function editmail() {
        $id = Auth::user()->id;
            $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
        return view('edit.email',['person'=>$person])
        ->with('title','Edycja adresu e-mail');
     
    
    }
    public function edittel() {
        $id = Auth::user()->id;
            $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
        return view('edit.telephone',['person'=>$person])
        ->with('title','Edycja numeru telefonu');
     
    
    }
    public function editcorr() {
        $id = Auth::user()->id;
            $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
        return view('edit.regaddress',['person'=>$person])
        ->with('title','Edycja adresu korespondecyjnego');
     
    
    }
    public function editreg() {
        $id = Auth::user()->id;
            $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
        return view('edit.regaddress',['person'=>$person])
        ->with('title','Edycja adresu korespondecyjnego');
     
    
    }
    public function updateEmail(Request $r) {
        $id = Auth::user()->id;
                $new_email = $r->input('email_contract');
            DB::update('UPDATE contracts SET email_contract =? WHERE id_contract = ?',[$new_email,$id]);
            echo "Adres e-mail został zmieniony. <a href='javascript:window.close()'>Zamknij to okno</a>";


    }
    public function updateTel(Request $r) {
        $id = Auth::user()->id;
        $new_tel = $r->input('telephone_contract');
    DB::update('UPDATE contracts SET telephone_contract =? WHERE id_contract = ?',[$new_tel,$id]);
    echo "Numer telefonu został zmieniony. <a href='javascript:window.close()'>Zamknij to okno</a>";


    }
    public function updatecorr(Request $r) {
        $id = Auth::user()->id;
        $new_code = $r->input('corrCode');
        $new_country = $r->input('corrCountry');
        $new_city = $r->input('corrCity');
        $new_street = $r->input('corrStreet');
        $new_house = $r->input('corrHouse');
        $new_flat = $r->input('corrFlat');
    DB::update('UPDATE contracts SET corrCode =?,corrCountry=?,corrCity=?,corrStreet=?,corrHouse=?,corrFlat=? WHERE id_contract = ?',[$new_code,$new_country,$new_city,$new_street,$new_house,$new_flat,$id]);
    echo "Dane adresowe  zostały zmienione. <a href='javascript:window.close()'>Zamknij to okno</a>";


    }
    public function updatereg(Request $r) {
        $id = Auth::user()->id;
        $new_regcode = $r->input('regCode');
        $new_regcountry = $r->input('regCountry');
        $new_regcity = $r->input('regCity');
        $new_regstreet = $r->input('regStreet');
        $new_reghouse = $r->input('regHouse');
        $new_regflat = $r->input('regFlat');
    DB::update('UPDATE contracts SET regCode =?,regCountry=?,regCity=?,regStreet=?,regHouse=?,regFlat=? WHERE id_contract = ?',[$new_regcode,$new_regcountry,$new_regcity,$new_regstreet,$new_reghouse,$new_regflat,$id]);
    echo "Dane adresowe  zostały zmienione. <a href='javascript:window.close()'>Zamknij to okno</a>";


    }
}
