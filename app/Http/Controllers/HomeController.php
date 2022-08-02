<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Student;
use App\Teacher;
use App\Course;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all()->count();
        $teacher = Teacher::all()->count();
        $student = Student::all()->count();
        $course = Course::all()->count();
        return view('dashboard', compact('user','teacher', 'student','course'));
       
    }
    public function dashboard()
    {
        $user = User::all()->count();
        $teacher = Teacher::all()->count();
        $student = Student::all()->count();
        $course = Course::all()->count();
        return view('dashboard', compact('user','teacher', 'student','course'));
    }

    public function profile(){
        
        return view('profile');
    }
    public function changePassword()
    {
        return view('changePassword');
    }
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return view('profile')->with('message', 'Password berhasil diubah');

    }

}
