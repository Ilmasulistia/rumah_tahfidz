<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    
    public function index()
    {
        $student=Student::all();

        return view('student.index', compact('student'));
    }
    
    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {        
        // $student = Student::create([
        //     'student_id'=>$request->input('student_id'),
        //     'name'=>$request->input('name'),
        //     'gender'=>$request->input('gender'),
        //     'school_name'=>$request->input('school_name'),
        //     'address'=>$request->input('address'),
        //     'birth_place'=>$request->input('birth_place'),
        //     'birth_date'=>$request->input('birth_date'),
        //     'parents_name'=>$request->input('parents_name'),
        //     'phone_no'=>$request->input('phone_no'),
        //     'parent_occupation'=>$request->input('parent_occupation'),
        //     'tuition_fee'=>$request->input('tuition_fee'),
        //     'join_date'=>$request->input('join_date'),
        //     'group_id'=>$request->input('group_id'),
                    
        //     ]);
                            
        //     return redirect()->route('student.index');
                // $request->validate([
                //     'user_id' => 'required|unique:users',
                //     'role_id' => 'required',
                //     'username' => 'required',
                //     'email' => 'required|unique:users',
                //     'password' => 'required',
                // ]);
            $user = new User();
            $user->user_id = $request->user_id; 
            $user->role_id = "3";
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->user_id);
            $user->save();
                    
            // $request->validate([
            //     'student_id' => 'required',
            //     'name' =>'required',
            //     'gender' => 'required',
            //     'school_name' => 'required',
            //     'address' => 'required',
            //     'birth_place'=> 'required',
            //     'birth_date' => 'required',
            //     'parents_name' => 'required',
            //     'phone_no' => 'required',
            //     'parent_occupation' => 'required',
            //     'tuition_fee' => 'required',
            //     'join_date' => 'required',
            //     'group_id' => 'required',
            // ]);

            $student = new student();
            $student->student_id = $request->user_id;
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->school_name = $request->school_name; 
            $student->address = $request->address;
            $student->birth_place = $request->birth_place;
            $student->birth_date = $request->birth_date; 
            $student->parents_name = $request->parents_name;
            $student->phone_no = $request->phone_no;
            $student->parent_occupation = $request->parent_occupation;
            $student->tuition_fee = $request->tuition_fee; 
            $student->join_date = $request->join_date;
            $student->save();
          
            return redirect()->route('student.index');
    }

    public function show($student_id)
    {
        $student = Student::find($student_id);
        return view('student.show', compact('student'));
    }
    public function edit($student_id)
    {
        $student = Student::where('student_id', $student_id)->first();
        
        return view('student.edit',compact('student', 'student_id'));
    }
    
    public function update(Request $request, Student $student_id)
    {
        $student = Student::find($request->student_id);
        $student->name= $request->input('student_id');
        $student->name= $request->input('name');
        $student->gender= $request->input('gender');
        $student->school_name= $request->input('school_name');
        $student->address= $request->input('address');
        $student->birth_place= $request->input('birth_place');
        $student->birth_date= $request->input('birth_date');
        $student->parents_name= $request->input('parents_name');
        $student->phone_no= $request->input('phone_no');
        $student->parent_occupation= $request->input('parent_occupation');
        $student->tuition_fee= $request->input('tuition_fee');
        $student->join_date= $request->input('join_date');
        $student->update();
        return redirect()->route('student.index');
    }

    public function delete($student_id)
    {
        $student = Student::find($student_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
