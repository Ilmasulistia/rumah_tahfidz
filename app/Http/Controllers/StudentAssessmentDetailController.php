<?php

namespace App\Http\Controllers;

use App\Student_assessment_detail;
use App\Student_assessment;
use App\Program_detail;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student_assessment_detail  $student_assessment_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student_assessment_detail  $student_assessment_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student_assessment_detail  $student_assessment_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student_assessment_detail  $student_assessment_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student_assessment_detail $student_assessment_detail)
    {
        //
    }
}
