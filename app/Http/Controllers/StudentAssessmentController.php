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
        // dd($class_id);
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
        // dd($student_assessment);
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

    public function update(Request $request, Student_assessment $student_assessment_id)
    {
  
        $student_assessment = Student_assessment::find($request->student_assessment_id);
        $student_assessment->student_id= $request->student_id;
        $student_assessment->class_id= $request->class_id;
        $student_assessment->number_of_memorization= $request->input('number_of_memorization');
        $student_assessment->behavior= $request->input('behavior');
        $student_assessment->dilligence= $request->input('dilligence');
        $student_assessment->neatness= $request->input('neatness');
        $student_assessment->ibadah= $request->input('ibadah');
        $student_assessment->class= $request->input('class');
        $student_assessment->note= $request->input('note');
        $student_assessment->update();

        return $student_assessment;
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
