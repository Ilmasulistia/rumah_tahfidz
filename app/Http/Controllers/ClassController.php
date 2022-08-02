<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Teacher;
use App\Student_assessment;
use App\Course;
use App\Program;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Exports\ClassExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class ClassController extends Controller
{
    public function index( Course $course_id)
    {   
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $classes = Classes::all();
        } else if (Auth::user()->role_id ==2){
            $classes = Classes::where("nik", Auth::user()->user_id)->get();
        } else if (Auth::user()->role_id ==4){
            $classes = Classes::all();
        } else if (Auth::user()->role_id ==3){
            $classes = Classes::leftjoin('student_assessments', 'student_assessments.class_id', '=', 'class.class_id')->where("student_id", Auth::user()->user_id)->get();
        }
        $teacher = Teacher::all();
        // $course = Course::all();
        // $classes = Classes::join('courses', 'courses.course_id', 'class.course_id') ->get('class.course_id', $course_id)->get();
        $course = Course::where('course_id', $course_id)->get();
        $program = Program::all();
       
        return view('class.index', compact('classes', 'teacher', 'course', 'course_id', 'roles', 'program'));

    }

    public function rekap()
    {
        $classes = Classes::join('student_assessments', 'student_assessments.program_id', 'class.class_id')
        ->where('class.class_id', $class_id)->get();
        $program = Program::where('program_id', $program_id)->get();
        return view('programdetail.index', compact('program_detail', 'program', 'program_id'));

    }
    
    public function create()
    {
        return view('class.create');
    }
    
    public function store(Request $request)
    {
        $classes = new Classes();
        $classes->class_id = $request->class_id;
        $classes->semester = $request->semester;
        $classes->year = $request->year;
        $classes->nik= $request->input('nik');
        $classes->course_id= $request->input('course_id');
        $classes->save();
        return redirect()->route('class.index')->with('Status', 'Data Berhasil Ditambah');
    }

    public function edit($class_id)
    {
        $classes = Classes::where('class_id', $class_id)->first();
        $teacher = Teacher::all();
        $course = Course::all();
        return view('class.edit',compact('classes','class_id','teacher','course'));

    }

        public function update(Request $request, $class_id)
    {
        $classes = Classes::where('class_id', $class_id)->update([
            'semester' => $request->input('semester'),
            'year' => $request->input('year'),
            'nik'=> $request->input('nik'),
            'course_id'=> $request->input('course_id'),
        ]);
        return redirect()->route('class.index')->with('Status', 'Data Berhasil Diubah');
        
    }

    public function classexport()
    {
        return Excel::download(new ClassExport,'kelas.xlsx');

    }

    public function delete($class_id)
    {
        $classes = Classes::find($class_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
