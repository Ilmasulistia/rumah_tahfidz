<?php

namespace App\Exports;

use App\Student_assessment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class StudentAssessmentExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Student_assessment::all();
//     }
// }

class StudentAssessmentExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('studentassessment.export', [
            'student_assessment' => Student_assessment::all()
        ]);
    }
}