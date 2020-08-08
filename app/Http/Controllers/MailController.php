<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Mail;

class MailController extends Controller
{
    public function index() {
       // $msg = Mail::all();

    $inbox = Auth::user()->email;
            
       $msg = Mail::all()->whereNotIn('recipient_mail',$inbox);  
      $recipient = Mail::where('recipient_mail',$inbox)->get();
        return view('mailbox',['msg'=>$msg])->with('title',"Poczta mailowa")
        ->with('mailbox1',"Do")
        ->with('mailbox2','Temat')
        ->with('mailbox3','Wysłano dnia')
        ->with('mailbox4',"Od")
        ->with('mailbox5','Temat')
        ->with('mailbox6','Odebrano dnia')
        ->with('mailbox7',"Temat")
        ->with('mailbox8','Utworzono dnia')
        ->with('msg',$msg)
        ->with('recipient',$recipient)
        ->with('sender',$inbox);

    }
    public function send(Request $req)
    {
        echo "Mail do nadawcy został wysłany. <br> <a href='/mailbox'>Powrót do skrzynki</a>";
        $write = new Mail;
        $write->sender_mail = $req->sender_mail;
        $write->recipient_mail = $req->recipient_mail;
        $write->title_mail = $req->title_mail;
        $write->text_mail = $req->text_mail;

        $write->created_at = $req->created_at;
        $write->save();        
        
    }
    public function draft(Request $r) {
        echo "Wiadomość zachowana jako kopia robocza";
        $draft  = new Mail;
        $draft->sender_mail = $r->sender_mail;
        $draft->recipient_mail = $r->recipient_mail;
        $draft->title_mail = $r->title_mail;
        $draft->text_mail = $r->text_mail;
        $draft->draft();

    }
    public function show($title_mail,$sender_mail,$recipient_mail,$text_mail,$created_at)
     {
        return view('showMail',compact('title_mail','sender_mail','recipient_mail','text_mail','created_at'));
    }
        public function answer(Request $req) {
            echo "Odpowiedź została wysłana";
                 $answer = new Mail;
                $answer->sender_mail = $req->sender_mail;
                $answer->recipient_mail = $req->recipient_mail;
                 $answer->title_mail = $req->title_mail;
                 $answer->text_mail = $req->text_mail;
                 $answer->created_at = $req->created_at;
                 $answer->save();
        }
}
