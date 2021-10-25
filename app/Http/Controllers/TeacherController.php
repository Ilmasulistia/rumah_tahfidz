<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    
    public function index()
    {
        $teacher=Teacher::all();

        return view('teacher.index', compact('teacher'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    // public function store(Request $request)
    // {
    //     Teacher::create([
    //         'nik' => $request->nik,
    //         'name' => $request->name,
    //         'address' => $request->address,
    //         'phone_no' => $request->phone_no
    //     ]);
    //     return redirect()->route('teacher.index');
    // }

    public function store(Request $request)
    {
        $user = new User();
        $user->user_id = $request->user_id;
        $user->role_id = "2";
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->user_id);
        $user->save();

        $teacher = new Teacher();
        $teacher->nik = $request->user_id;
        $teacher->name = $request->name;
        $teacher->address = $request->address;
        $teacher->phone_no = $request->phone_no;
        $teacher->save();
        
        return redirect()->route('teacher.index');
    }

    public function show(Teacher $teacher)
    {
        return view('teacher.show',compact('teacher'));
    }

    public function edit($nik)
    {
        $teacher = Teacher::where('nik', $nik)->first();
        // dd($teacher);
        return view('teacher.edit',compact('teacher','nik'));
    }

    public function update(Request $request, Teacher $nik )
    {
        // dd($request->all());
        // $teacher = Teacher::where('nik',$request->$nik)->update([
        //     'name'=> $request->input('name'),
        //     'address' => $request->input('address'),
        //     'phone_no' =>$request->input('phone_no')
        // ]);

        // return redirect()->route('teacher.index');
        

        $teacher = Teacher::find($request->nik);
        $teacher->name= $request->input('nik');
        $teacher->name= $request->input('name');
        $teacher->address= $request->input('address');
        $teacher->phone_no= $request->input('phone_no');
        $teacher->update();
        return redirect()->route('teacher.index');
    }

    public function delete($nik)
    {
        $teacher = Teacher::find($nik)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
