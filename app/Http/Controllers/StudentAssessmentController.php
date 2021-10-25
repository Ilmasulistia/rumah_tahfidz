<?php

namespace App\Http\Controllers;

use App\Student_assessment;
use App\Student;
use App\Classes;
use App\User;
use Illuminate\Http\Request;
use Auth;
use PDF;

class StudentAssessmentController extends Controller
{
    
    public function index($class_id)
    {
        $student_assessment = student_assessment::join('class', 'class.class_id', 'student_assessments.class_id')
        ->where('student_assessments.class_id', $class_id)->get();
        // dd($program_detail);
        $classes = Classes::where('class_id', $class_id)->get();
        $student = Student::all();
        $roles = Auth::user()->role_id;
        // dd($roles);
        return view('studentassessment.index', compact('student_assessment', 'roles', 'student','classes', 'class_id'));
    }

    public function create($student_id, $class_id)
    {
        $student_assessment = Student_assessment::where('student_id', $student_id)->first();
        // dd($dialy_assesment->class_id);
        $student=Student::where('student_id', $student_id)->get();
        return view('studentassessment.create', compact('student', 'student_id', 'class_id', 'student_assessment'));
    }

    public function store(Request $request)
    {
        $student_assessment = new Student_assessment();
        $student_assessment->student_id = $request->student_id;
        $student_assessment->class_id = $request->class_id;
        $student_assessment->number_of_memorization = $request->number_of_memorization;
        $student_assessment->behavior = $request->behavior;
        $student_assessment->dilligence = $request->dilligence;
        $student_assessment->neatness = $request->neatness;
        $student_assessment->ibadah = $request->ibadah;
        $student_assessment->class = $request->class;
        $student_assessment->note = $request->note;
        // return $student_assessment;
        $student_assessment->save();
        return redirect()->back();
        // return redirect()->route('studentassessment.index');
        
    }

    public function show(Student_assessment $student_assessment)
    {
        $student_assessment = student_assessment::all();
        return view('studentassessment.show', compact('student_assessment'));
    }

    public function edit($student_id)
    {
        $student_assessment = student_assessment::where('student_id', $student_id)->first();
        return view('studentassessment.edit',compact('student_assessment', 'student_id'));
    }

    public function update(Request $request)
    {
        $student_assessment = student_assessment::where('student_id', $request->student_id)->update([
            'class_id' => $request->input('class_id'),
            'number_of_memorization'=> $request->input('number_of_memorization'),
            'behavior'=> $request->input('behavior'),
            'dilligence'=> $request->input('dilligence'),
            'neatness'=> $request->input('neatness'),
            'ibadah'=> $request->input('ibadah'),
            'class'=> $request->input('class'),
            'note'=> $request->input('note'),
        ]);
        // dd($student_assessment);
        // return view('studentassessment.index');
        // return redirect()->route('studentassessment.show');
        // return redirect()->route('laporan-guru.index', ['class_id' => $student_assessment->class_id]); 
        return redirect()->back();
        // ganti
    }

    // public function updatedetail(Request $request){
    //     $detail_pengecekan_jaringan = DetailPengecekanJaringan::where('no_seri',$request->no_seri)->update([

    //         'tgl_pengecekan' => $request->input('tgl_pengecekan'),
    //         'id_master_jaringan' => $request->input('id_master_jaringan'),
    //         'nip_petugas' => $request->input('nip_petugas'),
    //         'tipe' => $request->input('tipe'),
    //         'kondisi'=> $request->input('kondisi'),

    //     ]);
    //     return $detail_pengecekan_jaringan;
    //     return redirect()->route('view.jaringan')->with('Status', 'Data Berhasil Ditambahkan');
    // }

    public function cetak_pdf()
    {
        $pdf = PDF::loadview('studentassessment.cetak');
    	return $pdf->stream();
    }

    public function delete($id)
    {
        $student_assessment = Student_assessment::where('student_id', '=', $id)->delete();

            return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
