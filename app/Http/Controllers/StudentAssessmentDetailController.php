<?php

namespace App\Http\Controllers;

use App\Student_assessment_detail;
use App\Student_assessment;
use App\Daily_assessment;
use App\Student;
use App\Classes;
use App\Sura;
use App\Program_detail;
use App\Program;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class StudentAssessmentDetailController extends Controller
{
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
        $program = Program::all();
        // dd($program);
        $student_assessment_detail = Student_assessment_detail::join('student_assessments', 'student_assessments.student_assessment_id', 'student_assessment_details.student_assessment_id')
        ->where('student_assessment_details.student_assessment_id', $student_assessment_id)->first();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        // dd($student_assessment_detail);
        return view('studentassessmentdetail.create', compact('program', 'student_assessment', 'student_assessment_detail', 'student_assessment_id'));
    }

    public function store(Request $request, $student_assessment_id)
    {
        // dd($request->number);
        $class_id = Student_assessment::select('class_id')->where('student_assessment_id', $student_assessment_id)->first();
        for ($i=0; $i < count($request->number) ; $i++) { 
            if ($request->number[$i] != null) {
                $student_assessment_detail = new Student_assessment_detail();
                Student_assessment_detail::create([
                    'student_assessment_id' => $request->student_assessment_id[$i],
                    'detail_id' => $request->detail_id[$i],
                    'number'=> $request->number[$i],
                    'status' => $request->status[$i],
                ]);
            }
        }
        return redirect()->route('laporan.index', ['class_id'=> $class_id->class_id])->with('Status', 'Data Berhasil Ditambah');

    }

    
    public function show($student_assessment_id)
    {
        $roles = Auth::user()->role_id;
        $student_assessment_detail = Student_assessment_detail::where('student_assessment_id', $student_assessment_id)->get();
        $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        // dd($student_assessment->status);
        // dd($daily_assessment);
        $student = Student::all();
        $program_detail = Program_detail::all();
        $program = Program::all();
        $sura = Sura::all();
        // dd($student_assessment);
        
        if($roles == 3){
            if($student_assessment->status == 0){
                return view('studentassessmentdetail.raporsantri', compact('student_assessment_detail', 'student_assessment','daily_assessment','student_assessment_id','student','sura','program', 'program_detail','roles'));
            }
            else{
                return view('studentassessmentdetail.show', compact('student_assessment_detail', 'student_assessment','daily_assessment','student_assessment_id','student','sura','program', 'program_detail','roles'));
            }
        }else{
            return view('studentassessmentdetail.show', compact('student_assessment_detail', 'student_assessment','daily_assessment','student_assessment_id','student','sura','program', 'program_detail','roles'));
        }
    
    }

    public function changeStatus($student_assessment_detail_id){
        $student_assessment_detail = \DB::table('student_assessment_details')->where('student_assessment_detail_id',$student_assessment_detail_id)->first();
        $status_sekarang = $student_assessment_detail->status;
        if($status_sekarang == "In Review"){
            \DB::table('student_assessment_details')->where('student_assessment_detail_id',$student_assessment_detail_id)->update([
                'status'=>"Approved"
            ]);
        }else{
            \DB::table('student_assessment_details')->where('student_assessment_detail_id',$student_assessment_detail_id)->update([
                'status'=>"In Review"
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
        return redirect ()->back();
    }

    
    public function edit(Student_assessment_detail $student_assessment_detail)
    {
        //
    }

    
    public function update(Request $request, Student_assessment_detail $student_assessment_id)
    {
        $class_id = Student_assessment::select('class_id')->where('student_assessment_id', $student_assessment_id)->first();
        $student_assessment_detail = Student_assessment_detail::where('student_assessment_id', $student_assessment_id)->update([
            'student_assessment_id' => $request->input('student_assessment_id'),
            'detail_id'=> $request->input('detail_id'),
            'number'=> $request->input('number'),
            'status'=> $request->input('status'),
        ]);
        return redirect()->route('laporan.index', ['class_id'=> $class_id->class_id])->with('Status', 'Data Berhasil Ditambah');
    }

    public function cetak_rapor($student_assessment_id)
    {
        $student_assessment_detail = Student_assessment_detail::where('student_assessment_id', $student_assessment_id)->get();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        $student = Student::all();
        $program_detail = Program_detail::all();
        $program = Program::all();
        $sura = Sura::all();
        $pdf = PDF::loadview('studentassessment.cetak', compact('student_assessment_detail', 'student_assessment','daily_assessment','student_assessment_id','student','sura','program', 'program_detail'));
    	return $pdf->stream();
    }
    
    public function destroy(Student_assessment_detail $student_assessment_detail)
    {
        //
    }
}
