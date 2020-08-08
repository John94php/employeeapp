<?php

   

namespace App\Http\Controllers;

use App\User;
use App\Contract;
use Illuminate\Support\Facades\Auth;
use App\Update;

use Illuminate\Http\Request;

  

class FileUploadController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUpload()

    {
        $id = Auth::user()->id;
        $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
 
        return view('edit.fileUpload',['person'=>$person])->with('title','Prześlij wniosek o zmianę danych ');

    }

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUploadPost(Request $request)

    {
        $id = Auth::user()->id;
        $person = User::join('contracts','users.id','contracts.id_contract')->where('id','=',$id)->get();
 
        $data = new Update;
        $data->id_contract = $request->id_contract;
        $data->fileName = $request->fileName;
        $data->reason = $request->reason;
        $data->newdata = $request->newdata;
        $data->olddata = $request->olddata;
        $data->save();
        $request->validate([

            'file' => 'required|mimes:pdf,xlx,csv,png,jpg|max:2048',

        ]);

  

        $fileName = $request->file->getClientOriginalName();  

   
        
        $request->file->move(public_path('uploads'), $fileName);

   

        return back()

            ->with('success','Wniosek został złożony prawidłowo. Poinformujemy Cię gdy zostanie on rozpatrzony')

            ->with('file',$fileName);
                
                
   

    }

}