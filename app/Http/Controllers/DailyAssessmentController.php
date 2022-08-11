<?php

namespace App\Http\Controllers;

use App\Daily_assessment;
use App\Student_assessment;
use App\Student;
use App\Sura;
use App\Pages;
use App\User;
use App\Role;
use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use PDF;


class DailyAssessmentController extends Controller
{
    public function index($student_assessment_id, Daily_assessment $daily_assessment_id)
    {
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $daily_assessment = Daily_assessment::all();
        } else if (Auth::user()->role_id ==4){
            $daily_assessment = Daily_assessment::all();
        } else if (Auth::user()->role_id ==3){
            $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        }
        $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        $edited = $daily_assessment->where('daily_assessment_id', $daily_assessment_id)->first();
        // dd($edited);
        $sura = Sura::orderBy('juz_no', 'ASC')->pluck('juz_no');
        // dd($sura);

   
        return view('dailyassessment.index_x', compact('daily_assessment', 'daily_assessment_id', 'edited', 'student_assessment','student_assessment_id', 'sura','roles'));
        // $daily_assessment = Daily_assessment::all();
        // return view('studentassessment.index', compact('studentassessment'));
    }



    //     public function store(Request $request, $student_assessment_id)
    // {
    //     $class_id = Student_assessment::select('class_id')->where('student_assessment_id', $student_assessment_id)->first();
    //     $daily_assessment = new Daily_assessment();
    //     $daily_assessment->daily_assessment_id = $request->daily_assessment_id;
    //     $daily_assessment->student_assessment_id = $student_assessment_id;
    //     $daily_assessment->date_of_recitation = $request->date_of_recitation;
    //     $daily_assessment->verse = $request->verse;
    //     $daily_assessment->verse_end = $request->verse_end;
    //     $daily_assessment->information = $request->information;
    //     $daily_assessment->surah_no = $request->surah_no;
    //     $daily_assessment->save();
    //     return redirect()->route('laporan.index', ['class_id'=> $class_id->class_id])->with('Status', 'Data Berhasil Ditambah');
    // }

    public function store(Request $request, $student_assessment_id)
    {
        try {
            $class_id = Student_assessment::select('class_id')->where('student_assessment_id', $student_assessment_id)->first();
            // $sura = Sura::where('student_assessment_id', $student_assessment_id)->distinct('juz')->get();
            $daily_assessment = new Daily_assessment();
            $daily_assessment->daily_assessment_id = $request->daily_assessment_id;
            $daily_assessment->student_assessment_id = $student_assessment_id;
            $daily_assessment->date_of_recitation = $request->date_of_recitation;
            $daily_assessment->juz_no = $request->juz_no;
            $daily_assessment->page_no = $request->page_no;
            $daily_assessment->part1 = $request->part1;
            $daily_assessment->part2 = $request->part2;
            $daily_assessment->part3 = $request->part3;
            $daily_assessment->information = $request->information;
            $daily_assessment->save();
            // return redirect()->route('penilaian.show', ['student_assessment_id'=> $student_assessment_id->student_assessment_id])->with('Status', 'Data Berhasil Ditambah');
            return redirect()->back()->with('Status', 'Data Berhasil Ditambah'); 
            // return redirect()->route('penilaian.show')->with('Status', 'Data Berhasil Ditambah');
        } catch (\Throwable $th) {
            $data = Daily_assessment::where('daily_assessments.student_assessment_id', $request->student_assessment_id)->where('daily_assessments.juz_no', $request->juz_no)->where('daily_assessments.page_no', $request->page_no)->first();
            $daily_assessment = Daily_assessment::where('daily_assessments.daily_assessment_id', $data->daily_assessment_id)->update([
                'student_assessment_id' => $data->student_assessment_id,
                'date_of_recitation'=> $request->input('date_of_recitation'),
                'juz_no'=> $request->juz_no,
                'page_no'=> $request->page_no,
                'part1'=> $request->input('part1'),
                'information'=> $request->input('information'),
            ]);
            // dd($daily_assessment);
            return redirect()->back()->with('Status', 'Data Berhasil Ditambah'); 
        }
        

        
    }

    public function input(Request $request, Student_assessment $student_assessment_id, Sura $juz_no)
    {
        $daily_assessment = Daily_assessment::join('student_assessments', 'student_assessments.student_assessment_id', 'daily_assessments.student_assessment_id')
        ->where('daily_assessments.student_assessment_id', $student_assessment_id)->first();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        // $sura = Sura::distinct('juz')->get();
        $sura = Sura::where('juz_no', $juz_no)->first();
        // $sura = Sura::all();
        $daily_assessment = Daily_assessment::all();
        // dd($student_assessment->student_id);
        return view('dailyassessment.create', compact('daily_assessment', 'student_assessment', 'student_assessment_id', 'sura','juz_no'));
    }

        public function show($student_assessment_id)
    {
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $daily_assessment = Daily_assessment::all();
        } else if (Auth::user()->role_id ==4){
            $daily_assessment = Daily_assessment::all();
        } else if (Auth::user()->role_id ==3){
            $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        }
        $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        // $daily_assessment = Daily_assessment::where('daily_assessment_id', 'daily_assessment_id', $daily_assessment_id)->get();

        $sura = Sura::all();
        return view('dailyassessment.show', compact('daily_assessment','student_assessment','student_assessment_id', 'sura','roles'));
    }

    public function hafalan()
    {
        $roles = Auth::user()->role_id;
        if (Auth::user()->role_id == 1) {
            $student_assessment = Student_assessment::all();
        } else if (Auth::user()->role_id == 4){
            $student_assessment = Student_assessment::all();
        }
        $sa1=DB::select("SELECT da.student_assessment_id, s.name as S_name, s.school_name as school, s.address, t.name as T_name, c.semester, c.year, da.daily_assessment_id, da.juz_no, da.page_no, da.part1 
        FROM students s, class c, teachers t, student_assessments sa, daily_assessments da WHERE s.student_id = sa.student_id AND sa.class_id=c.class_id AND c.nik=t.nik AND da.student_assessment_id=sa.student_assessment_id GROUP BY da.student_assessment_id ORDER BY da.juz_no DESC, da.page_no DESC, da.part1 DESC;");

        $sa2 = DB::select("SELECT s.name as S_name, s.school_name as school, s.address, t.name as T_name, c.semester, c.year, da.daily_assessment_id, da.student_assessment_id, da.juz_no, da.page_no, da.part1 
        FROM students s LEFT JOIN student_assessments sa ON s.student_id=sa.student_id LEFT JOIN class c ON sa.class_id=c.class_id LEFT JOIN teachers t ON c.nik=t.nik
        LEFT JOIN daily_assessments da ON sa.student_assessment_id=da.student_assessment_id WHERE da.daily_assessment_id IS NULL");

        $datas = array_merge($sa1, $sa2);
    
        return view('studentassessment.show', compact('datas',  'sa1', 'sa2', 'roles'));
    }

    public function nilai($daily_assessment_id)
    {
        // $roles = Auth::user()->role_id;
        // if (Auth::user()->role_id == 1) {
        //     $daily_assessment = Daily_assessment::all();
        // } else if (Auth::user()->role_id ==4){
        //     $daily_assessment = Daily_assessment::all();
        // } else if (Auth::user()->role_id ==3){
        //     $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        // }
        // $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        // $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        // $sura = Sura::all();
        // return view('dailyassessment.nilai', compact('daily_assessment','student_assessment','student_assessment_id', 'sura','roles'));
        $daily_assessment = Daily_assessment::where('daily_assessment_id', $daily_assessment_id)->first();
        // $daily_assessment = Daily_assessment::all();
        return view('dailyassessment.nilai',compact('daily_assessment', 'daily_assessment_id'));
    }

        public function edit($daily_assessment_id)
    {
        $daily_assessment = Daily_assessment::where('daily_assessment_id', $daily_assessment_id)->first();
        $sura = Sura::all();
        return view('dailyassessment.edit',compact('daily_assessment', 'daily_assessment_id', 'sura'));
    }

    public function update(Request $request, Daily_assessment $daily_assessment_id)
    {
        // $class_id = Student_assessment::select('class_id')->where('student_assessment_id', $student_assessment_id)->first();
        $daily_assessment = Daily_assessment::where('daily_assessment_id', $daily_assessment_id)->update([
            'student_assessment_id' => $request->input('student_assessment_id'),
            'date_of_recitation'=> $request->input('date_of_recitation'),
            'juz_no'=> $request->input('juz_no'),
            'page_no'=> $request->input('page_no'),
            'part1'=> $request->input('part1'),
            'information'=> $request->input('information'),
        ]);
        return redirect()->back(); 
    }

       public function cetak_hafalan($student_assessment_id)
    {
        $daily_assessment = Daily_assessment::where('student_assessment_id', $student_assessment_id)->get();
        $student_assessment = Student_assessment::where('student_assessment_id', $student_assessment_id)->first();
        $student = Student::all();
        $sura = Sura::all();
        $hafalan = PDF::loadview('dailyassessment.cetak', compact('daily_assessment','student','sura','student_assessment','student_assessment_id'));
    	return $hafalan->stream();
    }
    
    public function changepart1($daily_assessment_id){
        $daily_assessment = \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->first();
        $part1_sekarang = $daily_assessment->part1;
        if($part1_sekarang == "Belum Setor"){
            \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->update([
                'part1'=>"Sudah Setor"
            ]);
        }else{
            \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->update([
                'part1'=>"Belum Setor"
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
        return redirect ()->back();
    }

    public function changepart2($daily_assessment_id){
        $daily_assessment = \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->first();
        $part2_sekarang = $daily_assessment->part2;
        if($part2_sekarang == "Belum Setor"){
            \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->update([
                'part2'=>"Sudah Setor"
            ]);
        }else{
            \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->update([
                'part2'=>"Belum Setor"
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
        return redirect ()->back();
    }
    public function changepart3($daily_assessment_id){
        $daily_assessment = \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->first();
        $part3_sekarang = $daily_assessment->part3;
        if($part3_sekarang == "Belum Setor"){
            \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->update([
                'part3'=>"Sudah Setor"
            ]);
        }else{
            \DB::table('daily_assessments')->where('daily_assessment_id',$daily_assessment_id)->update([
                'part3'=>"Belum Setor"
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
        return redirect ()->back();
    }

       public function delete($id)
    {
        $daily_assessment = Daily_assessment::where('daily_assessment_id', '=', $id)->delete();

            return redirect()->back()->with('Status', 'Data Berhasil Dihapus');
    }
}
