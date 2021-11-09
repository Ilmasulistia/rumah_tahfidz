<?php

namespace App\Http\Controllers;

use App\Daily_assessment;
use App\Student_assessment;
use App\Sura;
use App\User;
use Illuminate\Http\Request;
use Auth;
use PDF;

class DailyAssessmentController extends Controller
{
    public function index()
    {
        $daily_assessment = Daily_assessment::all();
        return view('studentassessment.index', compact('studentassessment'));
        // $daily_assessment = Daily_assessment::join('student_assessments', 'student_assessments.class_id', 'daily_assessments.class_id')
        // ->where('daily_assessments.class_id', $class_id)->get()();
        // $daily_assessment = Daily_assessment::join('student_assessments', 'student_assessments.student_id', 'daily_assessments.student_id')
        // ->where('daily_assessments.student_id', $student_id)->get()();
        // $student_assessment = Student_assessment::where('class_id', $class_id)->get();
        // $student = Student::all();
        // $roles = Auth::user()->role_id;
        // return view('dailyassessment.index', compact('daily_assessment', 'student_assessment', 'roles', 'class_id','student_id'));
        // $daily_assessment = Daily_asdaily_assessmentsessment::join('student_assessments', 'student_assessments.class_id', 'daily_assessments.class_id')
        // ->where('daily_assessments.class_id', $class_id)->get();
        // $student_assessment = Student_assessment::where('class_id', $class_id)->get();
        // // dd($program_detail);
        // return view('dailyassessment.index', compact('daily_assessment', 'daily_assessment_id','student_assessment','roles'));
    }

        public function create($student_assessment_id)
    {
        // $daily_assessment = Daily_assessment::where('daily_assessment_id', $daily_assessment_id)->first();
        // // dd($dialy_assesment->class_id);
        // $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->get();
        // $sura = Sura::all();
        // return view('dailyassessment.create', compact('daily_assessment', 'student_assessment','student_assessment_id','daily_assessment_id', 'sura'));

        $daily_assessment = Daily_assessment::join('student_assessments', 'student_assessments.student_assessment_id', 'daily_assessments.student_assessment_id')
        ->where('daily_assessments.student_assessment_id', $student_assessment_id)->first();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        $sura = Sura::all();
        // dd($student_assessment->student_id);
        return view('dailyassessment.create', compact('daily_assessment', 'student_assessment', 'student_assessment_id', 'sura'));
    }

        public function store(Request $request)
    {
        $daily_assessment = new Daily_assessment();
        $daily_assessment->daily_assessment_id = $request->daily_assessment_id;
        $daily_assessment->student_assessment_id = $request->student_assessment_id;
        $daily_assessment->date_of_recitation = $request->date_of_recitation;
        $daily_assessment->verse = $request->verse;
        $daily_assessment->verse_end = $request->verse_end;
        $daily_assessment->information = $request->information;
        $daily_assessment->surah_no = $request->surah_no;
        $daily_assessment->save();
        return redirect()->back();

    }

        public function show()
    {
        $daily_assessment = Daily_assessment::all();
        $sura = Sura::all();
        return view('dailyassessment.show', compact('daily_assessment', 'sura'));
    }

        public function edit($student_id)
    {
        $daily_assessment = Daily_assessment::where('student_id', $student_id)->first();
        return view('dailyassessment.edit',compact('daily_assessment', 'student_id'));
    }

    public function update(Request $request, Daily_assessment $daily_assessment_id)
    {
        $daily_assessment = Daily_assessment::where('daily_assessment_id', $request->daily_assessment_id)->update([
            'student_assessment_id' => $request->input('student_assessment_id'),
            'date_of_recitation'=> $request->input('date_of_recitation'),
            'verse'=> $request->input('verse'),
            'verse_end'=> $request->input('verse_end'),
            'information'=> $request->input('information'),
            'surah_no'=> $request->input('surah_no'),
        ]);
        return redirect()->back(); 
        // // ganti
        // $daily_assessment = Daily_assessment::find($request->daily_assessment_id);
        // $daily_assessment->student_assessment_id= $request->input('student_assessment_id');
        // $daily_assessment->student_id= $request->input('student_id');
        // $daily_assessment->date_of_recitation= $request->input('date_of_recitation');
        // $daily_assessment->verse= $request->input('verse');
        // $daily_assessment->verse_end= $request->input('verse_end');
        // $daily_assessment->class= $request->input('class');
        // $daily_assessment->information= $request->input('information');
        // $daily_assessment->surah_no= $request->input('surah_no');
        // $daily_assessment->update();
        // return view('dailyassessment.create');
        
    }

       public function cetak_hafalan()
    {
        $hafalan = PDF::loadview('dailyassessment.cetak');
    	return $hafalan->stream();
    }
       public function delete($id)
    {
        $daily_assessment = Daily_assessment::where('student_id', '=', $id)->delete();

            return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
