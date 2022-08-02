<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Role;
use App\Exports\StudentExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;


class StudentController extends Controller
{
    
    public function index()
    {
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $student = Student::all();
        } else if (Auth::user()->role_id ==4){
            $student = Student::all();
        }
        $student=Student::all();
        return view('student.index', compact('student','roles'));
    }
    
    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {        
        
                $validation = $request->validate([
                    'user_id' => 'required',
                    'username' => 'required|min:5',
                    'email' => 'required|min:5'
                ],
                [
                    'name.required' => 'Harus diisi',
                    'name.min' => 'Minimal 5 Karakter',
                    'gender.required' => 'Harus diisi',
                    'school_name.required' => 'Harus diisi',
                    'address.required' => 'Harus diisi',
                    'birth_place.required' => 'Harus diisi',
                    'birth_date.required' => 'Harus diisi',
                    'parents_name.required' => 'Harus diisi',
                    'phone_no.required' => 'Harus diisi',
                    'parent_occupation.required' => 'Harus diisi',
                    'tuition_fee.required' => 'Harus Diisi',
                    'join_date.required' => 'Harus Diisi'
                ]
            );
            $user = new User();
            $user->user_id = $request->user_id; 
            $user->role_id = "3";
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->user_id);
            $user->save();
                    

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
          
            return redirect()->route('student.index')->with('Status', 'Data Berhasil Ditambah');
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
        return redirect()->route('student.index')->with('Status', 'Data Berhasil Diubah');
    }

    public function studentexport()
    {
        return Excel::download(new StudentExport,'santri.xlsx');

    }

    public function delete($student_id)
    {
        $student = Student::find($student_id)->delete();
        return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
