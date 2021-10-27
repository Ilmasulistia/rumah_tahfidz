<?php

namespace App\Http\Controllers;

use App\Student_assessment;
use App\Student;
use App\Classes;
use App\User;
use Illuminate\Http\Request;
use Auth;
use PDF;

use Illuminate\Support\Facades\DB;

class StudentAssessmentController extends Controller
{
    
    public function index(Student_assessment $student_id, $class_id)
    {
        $student_assessment = Student_assessment::join('class', 'class.class_id', 'student_assessments.class_id')
        ->where('student_assessments.class_id', $class_id)->get();
        // dd($student_assessment);
        // dd($program_detail);
        $classes = Classes::where('class_id', $class_id)->get();
        $student = Student::all();
        $roles = Auth::user()->role_id;
        // dd($roles);
        return view('studentassessment.index', compact('student_assessment', 'roles', 'student_id', 'student','classes', 'class_id'));
    }

    public function create($student_assessment_id)
    {
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        // dd($dialy_assesment->class_id);
        // $student=Student::where('student_id', $student_id)->get();
        // dd($student_id);
        // dd($student_assessment->student_id);
        return view('studentassessment.create', compact('student_assessment', 'student_assessment_id'));
    }

    public function store(Request $request)
    {
        $student_assessment = new Student_assessment();
        $student_assessment->student_assessment_id = $request->student_assessment_id;
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
        $student_assessment = Student_assessment::all();
        return view('studentassessment.show', compact('student_assessment'));
    }

    public function edit($student_id)
    {
        $student_assessment = Student_assessment::where('student_id', $student_id)->first();
        return view('studentassessment.edit',compact('student_assessment', 'student_id'));
    }

    // public function update(Request $request, $student_id, $class_id){
    //         $check = DB::table('student_assessments')
    //             ->select('student_assessment_id')
    //             ->where('student_id', $student_id)
    //             ->where('class_id', $class_id)
    //             ->first();
    //         // dd($check);
    //         if(!$check){
    //             $student_assessment = new Student_assessment ([
    //                 'student_id' => $student_id,
    //                 'class_id' => $class_id,
    //                 'number_of_memorization' => $request->input('number_of_memorization'),
    //                 'behavior'=> $request->input('behavior'),
    //                 'dilligence'=> $request->input('dilligence'),
    //                 'neatness'=> $request->input('neatness'),
    //                 'ibadah'=> $request->input('ibadah'),
    //                 'class'=> $request->input('class'),
    //                 'note'=> $request->input('note'),

    //             ]);
    //             $student_assessment->save();
    //             return $student_assessment;
    //             return redirect()->back()->with('message', 'Keterangan Berhasil Ditambahkan');
    //         }else{
    //             \Session::flash('sukses','Data sudah ada');
    //             return redirect()->back();
    //         }
    
    //     }

    public function update(Request $request, $student_assessment_id)
    {
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->update([
            'student_id' => $request->input('student_id'),
            'class_id' => $request->input('class_id'),
            'number_of_memorization'=> $request->input('number_of_memorization'),
            'behavior'=> $request->input('behavior'),
            'dilligence'=> $request->input('dilligence'),
            'neatness'=> $request->input('neatness'),
            'ibadah'=> $request->input('ibadah'),
            'class'=> $request->input('class'),
            'note'=> $request->input('note'),
        ]);
 
        return redirect()->back();
    }




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
