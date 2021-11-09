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

   
    public function create($student_assessment_id)
    {
        $programs = Program::all();
        // dd($programs);
        $student_assessment_detail = Student_assessment_detail::join('student_assessments', 'student_assessments.student_assessment_id', 'student_assessment_details.student_assessment_id')
        ->where('student_assessment_details.student_assessment_id', $student_assessment_id)->first();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        dd($student_assessment_detail);
        return view('studentassessmentdetail.create', compact('programs', 'student_assessment', 'student_assessment_detail', 'student_assessment_id'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
        $student_assessment_detail = new Student_assessment_detail();
        Student_assessment_detail::create([
            'student_assessment_id' => $request->student_assessment_id,
            'detail_id' => $request->detail_id,
            'number'=> $request->number,
            'affective' => $request->affective,
        ]);
        // return $student_assessment_detail;
        
        // $student_assessment_detail->student_assessment_id = $request->student_assessment_id;
        // $student_assessment_detail->detail_id = $request->detail_id;
        // $student_assessment_detail->number= $request->number;
        // $student_assessment_detail->affective = $request->affective;
        // $student_assessment_detail->save();
        // return redirect()->route('studentassessmentdetail.index');
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
        $student_assessment_detail = Student_assessment_detail::where('student_assessment_detail_id', $student_assessment_detail_id)->update([
            'student_assessment_id' => $request->input('student_assessment_id'),
            'detail_id'=> $request->input('detail_id'),
            'number'=> $request->input('number'),
            'affective'=> $request->input('affective'),
        ]);
        return redirect()->back();
    }

    
    public function destroy(Student_assessment_detail $student_assessment_detail)
    {
        //
    }
}
