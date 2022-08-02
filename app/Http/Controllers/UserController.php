<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user=User::all();

        return view('user.index', compact('user'));
    }
    public function profile(){
        $users = User::where('id', Auth::user()->id)->get();
        $roles = Auth::user()->role_id;
        return view('profile', compact('users','roles'));
    }
    public function store(Request $request){
        $user = new User();
            $user->user_id = $request->user_id; 
            $user->role_id = $request->role_id;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->user_id);
            $user->save();
            return redirect()->route('user.index')->with('Status', 'Data Berhasil Ditambah');
            
    }

    public function edit($user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        return view('user.edit',compact('user','user_id'));
    }
    
    public function update(Request $request, User $user_id)
    {
        $user = User::find($request->user_id);
        $user->user_id = $request->user_id;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role_id= $request->role_id;
        $user->update();
        return redirect()->route('user.index')->with('Status', 'Data Berhasil Diubah');
    }
    public function delete($user_id)
    {
        $user = User::find($user_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }

}
