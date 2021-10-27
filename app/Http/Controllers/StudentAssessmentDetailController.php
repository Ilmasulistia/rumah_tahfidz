<?php

namespace App\Http\Controllers;

use App\Student_assessment_detail;
use App\Student_assessment;
use App\Program_detail;
use App\Program;
use Illuminate\Http\Request;
use Auth;

class StudentAssessmentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_assessment_detail = Student_assessment_detail::all();
        $student_assessment = Student_assessment::all();
        $program_detail = Program_detail::all();
        $roles = Auth::user()->role_id;
        return view('Studentassessmentdetail.index', compact('student_assessment_detail', 'student_assessment', 'program_detail', 'roles'));
    }

   
    public function create()
    {
        $programs = Program::all();
        return view('studentassessmentdetail.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $student_assessment_detail = new Student_assessment_detail();
        $student_assessment_detail->student_id = $request->student_id;
        $student_assessment_detail->class_id = $request->class_id;
        $student_assessment_detail->detail_id = $request->detail_id;
        $student_assessment_detail->angka= $request->angka;
        $student_assessment_detail->afektif = $request->afektif;
        $student_assessment_detail->save();
        return redirect()->route('studentassessmentdetail.index');
    }

    
    public function show(Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    
    public function edit(Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    
    public function update(Request $request, Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    
    public function destroy(Student_assessment_detail $student_assessment_detail)
    {
        //
    }
}
