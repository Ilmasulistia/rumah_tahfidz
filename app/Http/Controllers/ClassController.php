<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Teacher;
use App\Course;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ClassController extends Controller
{
    public function index()
    {   
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $classes = Classes::all();
        } else if (Auth::user()->role_id ==2){
            $classes = Classes::where("nik", Auth::user()->user_id)->get();
        }
        $teacher = Teacher::all();
        $course = Course::all();

        return view('class.index', compact('classes', 'teacher', 'course', 'roles'));

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
        return redirect()->route('class.index');
    }

    public function edit($class_id)
    {
        $classes = Classes::where('class_id', $class_id)->first();
        return view('class.edit',compact('class','class_id'));

    }

        public function update(Request $request, Classes $class_id)
    {
        $classes = Classes::find($request->class_id);
        $classes->class_id= $request->input('class_id');
        $classes->semester= $request->input('semester');
        $classes->year = $requst->input('year');
        $classes->nik= $request->input('nik');
        $classes->course_id= $request->input('course_id');
        $classes->update();
        return redirect()->route('class.index');
        
    }
    public function delete($class_id)
    {
        $classes = Classes::find($class_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
