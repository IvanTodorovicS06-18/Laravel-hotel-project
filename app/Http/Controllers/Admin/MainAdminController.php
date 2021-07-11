<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateAdminUserAddRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MainAdminController extends Controller
{
    public function register(){
        $users = User::all();
        return view('admin.reg')->with('users',$users);
    }

    public function edit(Request $request,$id){
        $users = User::findOrFail($id);
        return view('admin.user-edit')->with('users',$users);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'lastname' => 'required|string|max:20|min:5',
            'phone' => 'required|string|max:10|min:10',
            'email' => 'required|string|email',
//            'password' => 'required', 'string', 'min:3',
            'usertype' => 'max:20',
            'balance' => 'numeric',

        ]);
            $users = User::find($id);
            $users->name = $request->input('name');
            $users->lastname = $request->input('lastname');
            $users->phone = $request->input('phone');
            $users->email = $request->input('email');
            $users->balance = $request->input('balance');
            $users->usertype = $request->input('usertype');
            $users->update();

        return redirect('/role-register')->with('status','Data updated');
    }

    public function delete($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/role-register')->with('status','User deleted');
    }

    public function addpage(){
        return view('admin.add');
    }

    public function save(CreateAdminUserAddRequest $request){
        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'lastname' => 'required|string|max:20|min:5',
            'phone' => 'required|string|max:10|min:10',
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
            'usertype' => 'max:20',
            'balance' => 'numeric',

        ]);
            $user = new User;

            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->balance = $request->input('balance');
            $user->usertype = $request->input('usertype');
            $user->save();
        return redirect('/role-register')->with('status','New user added');
    }
}
