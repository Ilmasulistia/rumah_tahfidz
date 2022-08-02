<?php

namespace App\Http\Controllers;

use App\Management;
use App\Teacher;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $management = Management::all();
        $teacher = Teacher::all();
        return view('management.index', compact('management', 'teacher'));

    }
    
    public function create()
    {
        return view('management.create');
    }
    
    public function store(Request $request)
    {
        $management = new Management();
        $management->management_id = $request->management_id;
        $management->start_periode = $request->start_periode;
        $management->nik= $request->input('nik');
        $management->position = $request->position;
        $management->save();
        return redirect()->route('management.index')->with('Status', 'Data Berhasil Ditambah');
    }

    public function edit($management_id)
    {
        $management = Management::where('management_id', $management_id)->first();
        $teacher = Teacher::all();
        return view('management.edit',compact('management','management_id','teacher'));

    }

    public function update(Request $request, $management_id)
    {
        $management = Management::where('management_id', $management_id)->update([
            'start_periode' => $request->input('start_periode'),
            'nik'=> $request->input('nik'),
            'position' => $request->input('position'),
        ]);
        return redirect()->route('management.index')->with('Status', 'Data Berhasil Diubah');
    }
    public function delete($management_id)
    {
        $management = Management::find($management_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
