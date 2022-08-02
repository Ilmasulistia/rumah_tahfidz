<?php

namespace App\Http\Controllers;

use App\Student_assessment;
use App\Daily_assessment;
use App\Student;
use App\Classes;
use App\Course;
use App\User;
use App\Role;
use App\Sura;
use Illuminate\Http\Request;
use App\Exports\StudentAssessmentExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Auth;

use Illuminate\Support\Facades\DB;

class StudentAssessmentController extends Controller
{
    
    public function index(Student_assessment $student_id, $class_id)
    {
        $student_assessment = Student_assessment::join('class', 'class.class_id', 'student_assessments.class_id')
        ->where('student_assessments.class_id', $class_id)->get();
        // if (course_id ==1){
        //     $classes = Classes::leftjoin('student_assessments', 'student_assessments.class_id', '=', 'class.class_id')->where("student_id", Auth::user()->user_id)->get();
        // }
        $classes = Classes::where('class_id', $class_id)->get();
        // dd($classes);
        $student = Student::all();
        // $course = Course::where('course_id', $course_id)->get();
        //  $classes = Classes::join('courses', 'courses.course_id', 'class.course_id') ->get('class.course_id', $course_id)->get();
        
        $sura = Sura::all();
        $roles = Auth::user()->role_id;
        // $course = Course::all()->role_id;
        return view('studentassessment.index', compact('student_assessment', 'sura','roles', 'student_id', 'student','classes', 'class_id'));
    }

    public function create($student_assessment_id)
    {
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
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
        $student_assessment->status = $request->status;
        $student_assessment->condition = $request->condition;
        // return $student_assessment;
        $student_assessment->save();
        return redirect()->back()->with('Status', 'Data Berhasil Ditambah');
        // return redirect()->route('studentassessment.index');
        
    }

    public function show()
    {
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $student_assessment = Student_assessment::all();
        } else if (Auth::user()->role_id == 4){
            $student_assessment = Student_assessment::all();
        }
        $student_assessment = Student_assessment::all();
        $student = Student::all();
        $classes = Classes::all();
        $course = Course::all();
        // $sura = Sura::all();
        return view('studentassessment.show', compact('student_assessment','student','classes', 'course', 'roles'));
    }

    public function changeStatusRapor($student_assessment_id){
        $student_assessment = \DB::table('student_assessments')->where('student_assessment_id',$student_assessment_id)->first();
        $status_sekarang = $student_assessment->status;
        if($status_sekarang == "0"){
            \DB::table('student_assessments')->where('student_assessment_id',$student_assessment_id)->update([
                'status'=>"1"
            ]);
        }else{
            \DB::table('student_assessments')->where('student_assessment_id',$student_assessment_id)->update([
                'status'=>"0"
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
        return redirect ()->back();
    }

    public function changeCondition($student_assessment_id){
        $student_assessment = \DB::table('student_assessments')->where('student_assessment_id',$student_assessment_id)->first();
        $condition_sekarang = $student_assessment->condition;
        if($condition_sekarang == "In Review"){
            \DB::table('student_assessments')->where('student_assessment_id',$student_assessment_id)->update([
                'condition'=>"Approved"
            ]);
        }else{
            \DB::table('student_assessments')->where('student_assessment_id',$student_assessment_id)->update([
                'condition'=>"In Review"
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
        return redirect ()->back();
    }

    public function edit($student_id)
    {
        $student_assessment = Student_assessment::where('student_id', $student_id)->first();
        return view('studentassessment.edit',compact('student_assessment', 'student_id'));
    }

    public function update(Request $request, $student_assessment_id)
    {
        $class_id = Student_assessment::select('class_id')->where('student_assessment_id', $student_assessment_id)->first();
        // $student_assessment = Student_assessment::where('class_id', $class_id)->get();
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
            'status'=> $request->input('status'),
            'condition'=> $request->input('condition'),
        ]);
 
        // return redirect()->back();
        return redirect()->route('laporan.index', ['class_id'=> $class_id->class_id])->with('Status', 'Data Berhasil Ditambah');
      
    }
    public function datakelasexport()
    {
        return Excel::download(new StudentAssessmentExport,'datakelas.xlsx');

    }

    public function delete($id)
    {
        $student_assessment = Student_assessment::where('student_id', '=', $id)->delete();

            return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
