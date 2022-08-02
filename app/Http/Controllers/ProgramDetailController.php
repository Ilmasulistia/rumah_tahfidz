<?php

namespace App\Http\Controllers;

use App\Program_detail;
use App\Program;
use Illuminate\Http\Request;

class ProgramDetailController extends Controller
{

    public function index($program_id)
    {
        $program_detail = Program_detail::join('programs', 'programs.program_id', 'program_details.program_id')
        ->where('program_details.program_id', $program_id)->get();
        $program = Program::where('program_id', $program_id)->get();
        return view('programdetail.index', compact('program_detail', 'program', 'program_id'));
    }
    
    public function create()
    {
        return view('programdetail.create');
    }

    public function store(Request $request)
    {
        $program_detail = new Program_detail();
        $program_detail->detail_id = $request->detail_id;
        $program_detail->materi = $request->materi;
        $program_detail->program_id = $request->program_id;
        $program_detail->save();
        return redirect()->back()->with('Status', 'Data Berhasil Ditambah');
        // return redirect()->route('programdetail.index', ['program_id'=> $program_id->program_id]);
    }

    
    public function show(Program_detail $program_detail)
    {
        //
    }

    public function edit($detail_id)
    {
        $program_detail = Program_detail::where('detail_id', $detail_id)->first();
        return view('programdetail.edit',compact('program_detail','detail_id'));
    }

    public function update(Request $request, $detail_id)
    {
        $program_id = Program_detail::select('program_id')->where('detail_id', $detail_id)->first();
        $program_detail = Program_detail::where('detail_id', $detail_id)->update([
            'materi' => $request->input('materi'),
        ]);
        // dd($program_id->program_id);
        return redirect()->route('programdetail.index', ['program_id'=> $program_id->program_id])->with('Status', 'Data Berhasil Diubah');
        // return redirect()->back();
    }

    public function delete($detail_id)
    {
        $program_detail = Program_detail::find($detail_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
