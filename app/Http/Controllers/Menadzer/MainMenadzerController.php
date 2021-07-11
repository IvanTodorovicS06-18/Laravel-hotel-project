<?php

namespace App\Http\Controllers\Menadzer;


use App\Minibar;
use App\Rezervacije;
use App\Soba;
use App\Userminibar;
use App\Userusluge;
use App\Uslugehotela;
use App\Zaposleni;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use mysql_xdevapi\Table;
use function Sodium\increment;

class MainMenadzerController extends Controller
{
    public function show(){
        $zaposleni = Zaposleni::all();
        return view('menadzer.pregledradnika')->with('zaposleni',$zaposleni);
    }

    public function edit(Request $request,$id){
        $zaposleni = Zaposleni::FindOrFail($id);
        return view('menadzer.zaposleni-edit')->with('zaposleni',$zaposleni);
    }

    public function update(Request $request,$id){
        $request->validate([
            'ime' => 'required|string|max:20|min:3',
            'prezime' => 'required|string|max:20|min:5',
            'adresa' => 'string|max:30|min:5',
            'telefon' => 'required|string|max:10|min:10',
            'datumrodjenja' =>'required|date|before:18 years ago',
            'datumistekaugovora' =>'required|date|date_format:Y-m-d|after:today',
            'datumistekasanitarneknjizice' =>'required|date|date_format:Y-m-d|after:today',
            'pozicija' => 'required|max:30',
            'radnisati' => 'numeric',

        ]);
        $zaposleni = Zaposleni::find($id);
        $zaposleni ->ime = $request->input('ime');
        $zaposleni ->prezime = $request->input('prezime');
        $zaposleni ->telefon = $request->input('telefon');
        $zaposleni ->adresa = $request->input('adresa');
        $zaposleni ->datumrodjenja = $request->input('datumrodjenja');
        $zaposleni ->datumistekaugovora = $request->input('datumistekaugovora');
        $zaposleni ->datumistekasanitarneknjizice = $request->input('datumistekasanitarneknjizice');
        $zaposleni ->radnisati = $request->input('radnisati');
        $zaposleni ->radio = $request->input('radio');
        $zaposleni ->pozicija = $request->input('pozicija');
        $zaposleni ->smena = $request->input('smena');
        $zaposleni ->update();

        return redirect('/zaposleni')->with('status','Data updated');
    }

    public function delete($id){
        $zaposleni = Zaposleni::findOrFail($id);
        $zaposleni->delete();
        return redirect('/zaposleni')->with('status','Zaposleni deleted');
    }

    public function addpage(){

        return view('menadzer.add');
    }

    public function save(Request $request){

        $request->validate([
            'ime' => 'required|string|max:20|min:3',
            'prezime' => 'required|string|max:20|min:5',
            'adresa' => 'string|max:30|min:5',
            'telefon' => 'required', 'string','max:10','min:10',
            'datumrodjenja' =>'date|before:18 years ago',
            'datumistekaugovora' =>'required|date|date_format:Y-m-d|after:today',
            'datumistekasanitarneknjizice' =>'required|date|date_format:Y-m-d|after:today',
            'pozicija' => 'max:30|required',



        ]);

        $zaposlen = new Zaposleni;
        $zaposlen->ime = $request->input('ime');
        $zaposlen->prezime = $request->input('prezime');
        $zaposlen->telefon = $request->input('telefon');
        $zaposlen->adresa = $request->input('adresa');
        $zaposlen->datumrodjenja = $request->input('datumrodjenja');
        $zaposlen->datumistekaugovora = $request->input('datumistekaugovora');
        $zaposlen->datumistekasanitarneknjizice = $request->input('datumistekasanitarneknjizice');
        $zaposlen->pozicija = $request->input('pozicija');

        $zaposlen->save();
        return redirect('/zaposleni')->with('status','Novi zaposleni dodat');
    }
    public function index(Zaposleni $zaposleni,Request $request){

             DB::table('zaposleni')
            ->where('radio','=','dosao')
             ->where('smena' ,'=','prva')
                 ->increment('radnisati', 8);

        return redirect('/zaposleni')->with('status','uspesno dodati radni sati');
    }

    public function drugasmena(Zaposleni $zaposleni,Request $request){

        DB::table('zaposleni')
            ->where('radio','=','dosao')
            ->where('smena' ,'=','druga')
            ->increment('radnisati', 8);

        return redirect('/zaposleni')->with('status','uspesno dodati radni sati');
    }

    public function showrooms(Soba $soba){
        $soba = Soba::all();
        return view('menadzer.sobe')->with('soba',$soba);
    }
    public function editroom(Request $request,$id){
        $soba = Soba::FindOrFail($id);
        return view('menadzer.soba-edit')->with('soba',$soba);
    }

    public function updateroom(Request $request,$id){
        $request->validate([

             'broj_kreveta' => 'required|numeric',
            'cena_sobe' => 'required|numeric',
            'zauzeta' => 'required',


        ]);
        $soba = Soba::find($id);

        $soba ->broj_kreveta = $request->input('broj_kreveta');
        $soba ->cena_sobe = $request->input('cena_sobe');
        $soba ->zauzeta = $request->input('zauzeta');
        $soba ->update();

        return redirect('/sobe')->with('status','Data updated');
    }

    public function deleteroom($id){
        $soba = Soba::findOrFail($id);
        $soba->delete();
        return redirect('/sobe')->with('status','Soba deleted');
    }
    public function addroom(){

        return view('menadzer.soba-add');
    }

    public function saveroom(Request $request, Soba $soba){

         $request->validate([
            'broj_sobe' => 'required|numeric|unique:soba,broj_sobe',
             'broj_kreveta' => 'required|numeric',
            'cena_sobe' => 'required|numeric',
         ]);
        $soba = Soba::query()->create($request->only(['broj_sobe','broj_kreveta','cena_sobe','zauzeta']));


        return redirect('/sobe')->with('status','Nova soba dodata');
    }
    public function vievrez(Rezervacije $rezervacije){

        $rezervacije = Rezervacije::all();
        return view('menadzer.vievrez')->with('rezervacije',$rezervacije);

    }
    public function deleterez($id,Soba $soba){
        $rezervacije = Rezervacije::findOrFail($id);
        $rezervacije->delete();

        $soba = DB::table('soba')
            ->where('id','=',$id)
            ->update(['zauzeta' => 'nije']);

        return redirect('/rezervacije')->with('status','Rezervacija obrisana');
    }
    public function editrez(Request $request,$id){
        $rezervacije = Rezervacije::FindOrFail($id);
        $users = User::all();
        $soba = Soba::all();
        $soba = DB::table('soba')
            ->where('zauzeta','=','nije')
            ->get();
        if ($soba->isEmpty()) {

            return redirect('/rezervacije')->with('status','Sve sobe su zauzete');

        }else{

            return view('menadzer.editrez',['soba' => $soba,'users' => $users,'rezervacije' =>$rezervacije]);
        }

    }

    public function updaterez(Request $request,$id){
        $request->validate([

            'datum_rezervacije' =>'required|date|date_format:Y-m-d|after:today',
            'broj_nocenja' => 'required|numeric',
        ]);
        $s =$request->input('soba_id');
        $rezervacije = Rezervacije::find($id);
//        $rezervacije ->user_id = $request->input('user_id');
        $rezervacije ->soba_id = $s;
        $rezervacije ->datum_rezervacije = $request->input('datum_rezervacije');
        $rezervacije ->broj_nocenja = $request->input('broj_nocenja');
        $rezervacije ->update();

        $soba = DB::table('soba')
            ->where('id','=',$s)
            ->update(['zauzeta' => 'jeste']);


        return redirect('/rezervacije')->with('status','Data updated');
    }

    public function postrez(){
        $users = User::all();
        $soba = Soba::all();
        $soba = DB::table('soba')
            ->where('zauzeta','=','nije')
            ->get();
        if ($soba->isEmpty()) {

            return redirect('/rezervacije')->with('status','Sve sobe su zauzete');

        }else{

            return view('menadzer.addrezm',['soba' => $soba,'users' => $users]);
        }

    }

    public function saverezm(Rezervacije $rezervacije,Soba $soba,Request $request,User $user){
        $request->validate([

            'datum_rezervacije' =>'required|date|date_format:Y-m-d|after:today',
            'broj_nocenja' => 'required|numeric',
        ]);
        $s = $request->input('soba_id');
        $rezervacije = Rezervacije::query()->create([
            'datum_rezervacije' => $request->input('datum_rezervacije'),
            'broj_nocenja' => $request->input('broj_nocenja'),
            'user_id' => $request->input('user_id'),
            'soba_id' => $request->input('soba_id')
        ]);
        $soba = DB::table('soba')
            ->where('id','=',$s)
            ->update(['zauzeta' => 'jeste']);
        $nocenja =$request->input('broj_nocenja');
        $userauth = $request->input('user_id');

        $cena = $request->input('soba_id');
        $soba = Soba::find($cena);

        $sum = $soba->cena_sobe * $nocenja;
        $users = DB::table('users')
            ->where('id','=', $userauth)
            ->increment('racun',$sum);



        return redirect('/rezervacije')->with('status','Nova rezervacija napravljena');
    }
    public function pregledu($id){
        $user = User::FindOrFail($id);

        return view('menadzer.pregledusera')->with('user',$user);
    }

    public function pregledsobe($id,Soba $soba){
        $soba = Soba::FindOrFail($id);
        return view('menadzer.pregledsobe')->with('soba',$soba);
    }

    public function vievuslg(Uslugehotela $uslugehotela){

        $uslugehotela = Uslugehotela::all();
        return view('menadzer.vievuslg')->with('uslugehotela',$uslugehotela);

    }
    public function deleteuslg($id){
        $uslugehotela = Uslugehotela::findOrFail($id);
        $uslugehotela->delete();
        return redirect('/uslugehotela')->with('status','Usluga deleted');
    }
    public function edituslg(Request $request,$id){
        $uslugehotela = Uslugehotela::FindOrFail($id);
        return view('menadzer.edituslg')->with('uslugehotela',$uslugehotela);
    }

    public function updateuslg(Request $request,$id){
        $request->validate([
            'tipusluge' => 'required|string|max:20|min:3',
            'cena_usluge' => 'required|numeric',


        ]);
        $uslugehotela = Uslugehotela::find($id);
        $uslugehotela ->tipusluge = $request->input('tipusluge');
        $uslugehotela ->cena_usluge = $request->input('cena_usluge');
        $uslugehotela ->update();

        return redirect('/uslugehotela')->with('status','Data updated');
    }
    public function postuslg(){

        return view('menadzer.adduslg');
    }

    public function saveuslg(Request $request,User $user){
        $request->validate([
            'tipusluge' => 'required|string|max:20|min:3',
            'cena_usluge' => 'required|numeric',


        ]);
        $uslugehotela = new Uslugehotela();
        $uslugehotela->tipusluge = $request->input('tipusluge');
        $uslugehotela->cena_usluge = $request->input('cena_usluge');
        $uslugehotela->save();
        return redirect('/uslugehotela')->with('status','Nova usluga dodata');
    }

    public function Vievuserusluge(Userusluge $userusluge){
        $userusluge = Userusluge::all();

        return view('menadzer.pregledkorisnickihusluga')->with('userusluge',$userusluge);

    }

    public function pregeledusluge($id,Uslugehotela $uslugehotela){
        $uslugehotela = Uslugehotela::FindOrFail($id);
        return view('menadzer.pregledusluge')->with('uslugehotela',$uslugehotela);
    }

    public function deleteuserulugu($id,Userusluge $userusluge){
        $userusluge = Userusluge::findOrFail($id);
        $userusluge->delete();

        return redirect('/istorija-kupovine-usluga')->with('status','Transakcija obrisana');
    }

    public function edituserusluge(Request $request,$id){
        $userusluge = Userusluge::findOrFail($id);
        $users = User::all();
        $uslugehotela = Uslugehotela::all();

        return view('menadzer.edituserulsuge',['uslugehotela' => $uslugehotela,'users' => $users,'userusluge' =>$userusluge]);
    }

    public function updatuserusluge(Request $request,$id){


        $userusluge = Userusluge::find($id);
//        $userusluge ->user_id = $request->input('user_id');
        $userusluge ->uslugehotela_id = $request->input('uslugehotela_id');
        $userusluge ->update();


        return redirect('/istorija-kupovine-usluga')->with('status','Data updated');
    }

    public function postuserusluge(Uslugehotela $uslugehotela){
        $users = User::all();
        $uslugehotela = Uslugehotela::all();

        return view('menadzer.adduseruslugu',['uslugehotela' => $uslugehotela,'users' => $users]);
    }

    public function saveuserusluge(Uslugehotela $uslugehotela,Userusluge $userusluge,Request $request,User $user){
        $selectuser = $request->input('user_id');
        $userusluge = Userusluge::query()->create([

            'uslugehotela_id' =>  $request->input('uslugehotela_id'),
            'user_id' => $selectuser,

        ]);


        $cena = $request->input('uslugehotela_id');
        $uslugeHotela = UslugeHotela::find($cena);
        $sum = $uslugeHotela->cena_usluge ;


        $users = DB::table('users')
            ->where('id','=', $selectuser)
            ->increment('racun',$sum);

        return redirect('/istorija-kupovine-usluga')->with('status','Uspesno');
    }

    public function Vievminibar(Minibar $minibar){
        $minibar = Minibar::all();

        return view('menadzer.pregledminibara')->with('minibar',$minibar);

    }

    public function deleteminibaru($id,Minibar $minibar){
        $minibar = Minibar::findOrFail($id);
        $minibar->delete();

        return redirect('/minibar-pregled')->with('status','Proizvod obrisan');
    }
    public function editminibar(Minibar $minibar,$id){
        $minibar = Minibar::FindOrFail($id);
        return view('menadzer.editminibar')->with('minibar',$minibar);
    }

    public function updateminibar(Request $request,$id){
        $request->validate([
            'pice' => 'required|string|max:20|min:3',
            'cena_pica' => 'required|numeric',
            'kolicina' => 'required|numeric',
        ]);

            $minibar = Minibar::find($id);
        $minibar ->pice = $request->input('pice');
        $minibar ->cena_pica = $request->input('cena_pica');
        $minibar ->kolicina = $request->input('kolicina');
        $minibar ->update();

        return redirect('/minibar-pregled')->with('status','Data updated');
    }
    public function addminibarproizvod(){

        return view('menadzer.addminibar');
    }

    public function saveminibarproizvod(Request $request,User $user){
        $request->validate([
            'pice' => 'required|string|max:20|min:3',
            'cena_pica' => 'required|numeric',
            'kolicina' => 'required|numeric',
        ]);
        $minibar = new Minibar();
        $minibar->pice = $request->input('pice');
        $minibar->cena_pica = $request->input('cena_pica');
        $minibar->kolicina = $request->input('kolicina');
        $minibar->save();
        return redirect('/minibar-pregled')->with('status','Nova proizvod dodat');
    }
    public function pregeleduserminibara(Userminibar $userminibar){
        $userminibar = Userminibar::all();
        return view('menadzer.userminibarpregled')->with('userminibar',$userminibar);
    }
    public function pregeledproizvoda($id,Minibar $minibar){
        $minibar = Minibar::FindOrFail($id);
        return view('menadzer.singleminibar')->with('minibar',$minibar);
    }
    public function deleteuserminibar($id,Userminibar $userminibar){
        $userminibar = Userminibar::findOrFail($id);
        $userminibar->delete();

        return redirect('/userminibar')->with('status','Obrisano');
    }


}
