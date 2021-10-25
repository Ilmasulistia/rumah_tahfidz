<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        return view('course.index', compact('course'));
    }
    
    public function create()
    {
        return view('course.create');
    }
    
    public function store(Request $request)
    {
        $course = new Course();
        $course->course_id = $request->course_id;
        $course->course_name = $request->course_name;
        $course->save();
        return redirect()->route('course.index');
    }

    public function edit($course_id)
    {
        $course = course::where('course_id', $course_id)->first();
        return view('course.edit',compact('course','course_id'));
    }

        public function update(Request $request, course $course_id)
    {
        // $validation = $request->validate([
        //         'course_name' => 'required|min:5'
        //     ],
        //     [
        //         'course_name.required' => 'Harus diisi',
        //         'course_name.min' => 'Minimal 5 Karakter',
        //     ]
        // );

        $course = course::find($request->course_id);
        $course->course_id= $request->input('course_id');
        $course->course_name= $request->input('course_name');
        $course->update();
        return redirect()->route('course.index');
    }
    public function delete($course_id)
    {
        $course = course::find($course_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
