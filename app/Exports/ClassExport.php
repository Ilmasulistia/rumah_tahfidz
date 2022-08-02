<?php

namespace App\Exports;

use App\Classes;
use App\Teacher;
use App\Student_assessment;
use App\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


// class ClassExport implements FromCollection, WithHeadings, ShouldAutoSize
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Classes::all();
//         return Teacher::all();
//         return Course::all();
//     }
//     public function headings(): array
//     {
//         return [
//             'Kelas',
//             'Semester',
//             'Tahun',
//             'Guru',
//             'Program',
//         ];
//     }
// }


class ClassExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('class.export', [
            'classes' => Classes::all()
        ]);
    }
}