<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcomelog',function () {
    return view('welcomelog');
});
Route::get('/profile','UserController@profile');
Route::get('attendance','AttendanceController@index');
Route::get('vacationlist','VacationController@index'); 
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::view('vlist','VacationController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('attendance','AttendanceController@attendance');
Route::post('vacation','VacationController@save');
Route::get('mailbox','MailController@index');
Route::post('submitMail','MailController@send');
Route::get('showMail/{title_mail}/{sender_mail}/{recipient_mail}/{text_mail}/{created_at}','MailController@show');
Route::post('answerMail','MailController@answer');
Route::get('edit/email','EditController@editmail');
Route::get('edit/telephone','EditController@edittel');
Route::get('edit/corraddress','EditController@editcorr');
Route::get('edit/regaddress','EditController@editreg');
Route::post('submitreg','EditController@updatereg');
Route::post('submitcorr','EditController@updatecorr');
Route::post('submitMail','EditController@updateEmail');
Route::post('submitTel','EditController@updateTel');



Route::get('edit/file-upload','FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload','FileUploadController@fileUploadPost')->name('file.upload.post');
//Route::post('file-upload','FileUploadController@fileUploadPost');