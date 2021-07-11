<?php

namespace App\Http\Controllers;

use App\Minibar;
use App\Rezervacije;
use App\Soba;
use App\User;
use App\Userusluge;
use App\Uslugehotela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function userhome(){

        if (Auth::user()){
            return view('gost.gosthome');
        }else{
            return redirect('/login');
        }

    }

    public function vievrez(Soba $soba,Request $request){
        $soba = DB::table('soba')
            ->where('zauzeta','=','nije')
            ->get();
        if ($soba->isEmpty()) {

            return redirect('/mainpage')->with('status','Sve sobe su zauzete');

        }else{

            return view('gost.rez',['soba' => $soba]);
        }
    }
    public function saverez(Rezervacije $rezervacije,Soba $soba,Request $request,User $user){

        $request->validate([

            'datum_rezervacije' =>'required|date|date_format:Y-m-d|after:today',
            'broj_nocenja' => 'required|numeric',
        ]);
        $s = $request->input('soba_id');
        $rezervacije = Rezervacije::query()->create([
            'datum_rezervacije' => $request->input('datum_rezervacije'),
            'broj_nocenja' => $request->input('broj_nocenja'),
            'user_id' => auth()->id(),
            'soba_id' => $request->input('soba_id')
        ]);
        $soba = DB::table('soba')
            ->where('id','=',$s)
            ->update(['zauzeta' => 'jeste']);
        $nocenja =$request->input('broj_nocenja');
        $userauth = auth()->id();
        $cena = $request->input('soba_id');
       $soba = Soba::find($cena);

        $sum = $soba->cena_sobe * $nocenja;

        $users = DB::table('users')
            ->where('id','=', $userauth)
            ->increment('racun',$sum);

        return redirect('/mainpage')->with('status','Rezervacija uspesna');
    }


    public function edituslg(User $user,Uslugehotela $uslugehotela){
        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            $uslugehotela = Uslugehotela::all();
            return view('gost.kupovinausluga',['user' => $user,'uslugehotela' => $uslugehotela]);
        }else{
           return redirect()->back();
        }

    }

    public function updateuslg(Request $request,User $user,Uslugehotela $uslugehotela){
        $user = User::find(Auth::user()->id);
        if ($user){
            $user->uslugehotela()->attach($request->uslugehotela);
            $userauth = auth()->id();
        $uslugehotela = Uslugehotela::query()->whereIn('id',$request->uslugehotela)->select('cena_usluge')->get();


            $racun = 0;
            foreach ($uslugehotela as $usluga){
                $racun += $usluga['cena_usluge'];
            }
            $users = DB::table('users')
                ->where('id','=', $userauth)
                ->increment('racun',$racun);

            return redirect('/user-edit')->with('status','Uspesno ste izvrsili kupovinu. Da li zelite da narucite jos nesto');

        }else{
            return redirect()->back();
        }
    }

    public function editmini(User $user,Minibar $minibar){
        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            $minibar = Minibar::all();
            $minibar = DB::table('minibar')
                ->where('kolicina','>',0)
                ->get();
            return view('gost.minibar',['user' => $user,'minibar' => $minibar]);
        }else{
            return redirect()->back();
        }


    }

    public function updatemini(Request $request,User $user,Minibar $minibar){
        $user = User::find(Auth::user()->id);
        if ($user){
            $user->minibars()->attach($request->minibar);
       $minibar =  Minibar::query()->whereIn('id',$request->minibar)->select('cena_pica')->get();
            $racun = 0;
         foreach ($minibar as $usluga){
            $racun += $usluga['cena_pica'];
          }

       $cena = $request->input('minibar');
       $userauth = auth()->id();

             DB::table('users')
           ->where('id','=', $userauth)
           ->increment('racun',  $racun );

       return redirect('/user-mini-edit')->with('status','Uspesno,Zelite li da uzmete jos nesto?');

        }else{
            return redirect()->back();
        }
    }

    public function profile(User $user,$id){
        $user = User::find($id);
        if ($user){
            return view('gost.profile')->with('user',$user);
        }else{
            return redirect('/mainpage');
        }
    }

    public function racun(Request $request){

       $racun = $request->input('racun');
        $balance = $request->input('balance');
            $rez = $racun - $balance;
            $stanjebalansa = $balance - $racun;
        if ($racun > $balance){
            return redirect('/mainpage')->with('status','nemate dovoljno sredstava na racunu');
        }
        if ($racun <= 0){
            $treci = DB::table('users')
                ->where('racun','<', 0)
                ->update(['racun' => 0]);
            return redirect('/mainpage')->with('status','Racun je vec placen');
        }
        $userauth = auth()->id();
        $users = DB::table('users')
            ->where('id','=', $userauth)
            ->update(['balance' => $stanjebalansa]);

        $stanje = DB::table('users')
            ->where('id','=', $userauth)
            ->update(['racun' => $rez]);

        $drugi = DB::table('users')
            ->where('racun','<', 0)
            ->update(['racun' => 0]);

        return redirect('/mainpage')->with('status','Uspesno');

    }


}
