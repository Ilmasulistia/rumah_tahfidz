<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();
        return view('program.index', compact('program'));
    }
    
    public function create()
    {
        return view('program.create');
    }
    
    public function store(Request $request)
    {
        $program = new Program();
        $program->program_id = $request->program_id;
        $program->program_name = $request->program_name;
        $program->save();
        return redirect()->route('program.index');
    }

    public function edit($program_id)
    {
        $program = Program::where('program_id', $program_id)->first();
        return view('program.edit',compact('program','program_id'));
    }

        public function update(Request $request, Program $program_id)
    {
        // $validation = $request->validate([
        //         'program_name' => 'required|min:5'
        //     ],
        //     [
        //         'program_name.required' => 'Harus diisi',
        //         'program_name.min' => 'Minimal 5 Karakter',
        //     ]
        // );

        $program = Program::find($request->program_id);
        $program->program_id= $request->input('program_id');
        $program->program_name= $request->input('program_name');
        $program->update();
        return redirect()->route('program.index');
    }
    public function delete($program_id)
    {
        $program = Program::find($program_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
