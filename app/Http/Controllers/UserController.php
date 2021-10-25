<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user=User::all();

        return view('user.index', compact('user'));
    }
    public function edit($user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        return view('user.edit',compact('user','user_id'));
    }
    
    public function update(Request $request, User $user_id)
    {
        // $validation = $request->validate([
        //         'username' => 'required|min:5',
        //         'password' => 'required|min:5',
        //     ],
        //     [
        //         'username.required' => 'Harus diisi',
        //         'username.min' => 'Minimal 5 Karakter',
        //         'password.required' => 'isi password',
        //         'password.min' => 'Minimal 5 Karakter',
        //     ]
        // );
        $user = User::find($request->user_id);
        $user->user_id = $request->user_id;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role_id= $request->role_id;
        $user->update();
        return redirect()->route('user.index');
    }
    public function delete($user_id)
    {
        $user = User::find($user_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }

}
