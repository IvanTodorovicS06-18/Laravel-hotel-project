<?php

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
    return redirect()->route('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mainpage', 'UserController@userhome');
Route::get('/user-edit','UserController@edituslg');
Route::put('/user-update','UserController@updateuslg');
Route::get('/user-mini-edit','UserController@editmini');
Route::put('/user--mini-update','UserController@updatemini');
Route::get('/rez-forma','UserController@vievrez');
Route::post('/rez-save','UserController@saverez');
Route::get('/profile/{id}', 'UserController@profile')->name('profile');
Route::post('/placanje', 'UserController@racun');
//<------------------------------------------------------------------->
Route::group(['middleware' => ['auth','menadzer']],function (){

    //                        <Menadzer>
    //<------------------------------------------------------------------->
//                          <zaposleni>
    Route::get('/zaposleni', 'Menadzer\MainMenadzerController@show');
    Route::get('/zaposleni-edit/{id}','Menadzer\MainMenadzerController@edit');
    Route::put('/zaposleni-update/{id}','Menadzer\MainMenadzerController@update');
    Route::delete('/zaposleni-delete/{id}','Menadzer\MainMenadzerController@delete');
    Route::get('/zaposleniadd','Menadzer\MainMenadzerController@addpage');
    Route::post('/zaposlenisave','Menadzer\MainMenadzerController@save');
    Route::get('/radnisati', 'Menadzer\MainMenadzerController@index');
    Route::get('/radnisati2', 'Menadzer\MainMenadzerController@drugasmena');
//<------------------------------------------------------------------->
//                          <sobe>
    Route::get('/sobe', 'Menadzer\MainMenadzerController@showrooms');
    Route::get('/sobe-edit/{id}','Menadzer\MainMenadzerController@editroom');
    Route::put('/sobe-update/{id}','Menadzer\MainMenadzerController@updateroom');
    Route::delete('/sobe-delete/{id}','Menadzer\MainMenadzerController@deleteroom');
    Route::get('/sobeadd','Menadzer\MainMenadzerController@addroom');
    Route::post('/sobesave','Menadzer\MainMenadzerController@saveroom');
//<------------------------------------------------------------------->
//                          <rezervacije>

    Route::get('/rezervacije', 'Menadzer\MainMenadzerController@vievrez');
    Route::get('/rez-edit/{id}','Menadzer\MainMenadzerController@editrez');
    Route::put('/rez-update/{id}','Menadzer\MainMenadzerController@updaterez');
    Route::delete('/rez-delete/{id}','Menadzer\MainMenadzerController@deleterez');
    Route::get('/addrezm','Menadzer\MainMenadzerController@postrez');
    Route::post('/save-rezm','Menadzer\MainMenadzerController@saverezm');
    Route::get('/pregledusera/{user_id}','Menadzer\MainMenadzerController@pregledu');
    Route::get('/pregledsobe/{soba_id}','Menadzer\MainMenadzerController@pregledsobe');

    //<------------------------------------------------------------------->
    //                          <Usluge hotela>
    Route::get('/uslugehotela', 'Menadzer\MainMenadzerController@vievuslg');
    Route::get('/uslg-edit/{id}','Menadzer\MainMenadzerController@edituslg');
    Route::put('/uslg-update/{id}','Menadzer\MainMenadzerController@updateuslg');
    Route::delete('/uslg-delete/{id}','Menadzer\MainMenadzerController@deleteuslg');
    Route::get('/adduslg','Menadzer\MainMenadzerController@postuslg');
    Route::post('/saveuslg','Menadzer\MainMenadzerController@saveuslg');
    //<------------------------------------------------------------------->
    //                    <Istorija kupovine korisnickih usluga>

    Route::get('/istorija-kupovine-usluga', 'Menadzer\MainMenadzerController@Vievuserusluge');
    Route::get('/pregledusluge/{uslugehotela_id}','Menadzer\MainMenadzerController@pregeledusluge');
    Route::delete('/Transakcija-usluge-delete/{id}','Menadzer\MainMenadzerController@deleteuserulugu');
    Route::get('/userusluga-edit/{id}','Menadzer\MainMenadzerController@edituserusluge');
    Route::put('/userusluga-update/{id}','Menadzer\MainMenadzerController@updatuserusluge');
    Route::get('/adduserusluge','Menadzer\MainMenadzerController@postuserusluge');
    Route::post('/saveuserusluge','Menadzer\MainMenadzerController@saveuserusluge');
    //<------------------------------------------------------------------->
    //                              <Minibar>
    Route::get('/minibar-pregled', 'Menadzer\MainMenadzerController@Vievminibar');
    Route::delete('/minibar-delete/{id}','Menadzer\MainMenadzerController@deleteminibaru');
    Route::get('/minibar-edit/{id}','Menadzer\MainMenadzerController@editminibar');
    Route::put('/minibar-update/{id}','Menadzer\MainMenadzerController@updateminibar');
    Route::get('/addminibar','Menadzer\MainMenadzerController@addminibarproizvod');
    Route::post('/saveminibar','Menadzer\MainMenadzerController@saveminibarproizvod');
    Route::get('/userminibar', 'Menadzer\MainMenadzerController@pregeleduserminibara');
    Route::delete('/user-minibar-delete/{id}','Menadzer\MainMenadzerController@deleteuserminibar');
    Route::get('/pregledproizvoda/{minibar_id}','Menadzer\MainMenadzerController@pregeledproizvoda');
});
//<------------------------------------------------------------------->
//                          <user>


//                          <admin>
Route::group(['middleware' => ['auth','admin']],function (){

    Route::get('/role-register', 'Admin\MainAdminController@register');
    Route::get('/role-edit/{id}','Admin\MainAdminController@edit');
    Route::put('/user-update/{id}','Admin\MainAdminController@update');
    Route::delete('/role-delete/{id}','Admin\MainAdminController@delete');
    Route::get('/useradd','Admin\MainAdminController@addpage');
    Route::post('/usersave','Admin\MainAdminController@save');
    
});
