<?php

namespace App\Exports;

use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class StudentExport implements FromCollection
// {
//     use Exportable;
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Student::all();
//     }

//     // public function view()
//     // {
//     //     return view('student.export', 'student'-> Student::all);
//     // }
// }

class StudentExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('student.export', [
            'student' => Student::all()
        ]);
    }
}
// class StudentExport implements FromCollection, WithHeadings, ShouldAutoSize
// {
//     /**
//      * @return \Illuminate\Support\Collection
//      */
//     public function collection()
//     {
//         return Student::all();
//     }

//     public function headings(): array
//     {
//         return [
//             'ID Santri',
//             'Nama',
//             'Jenis Kelamin',
//             'Asal Sekolah',
//             'Alamat',
//             'Tempat Lahir',
//             'Tanggal Lahir',
//             'Nama Orangtua',
//             'Nomor HP',
//             'Pekerjaan Orangtua',
//             'SPP',
//             'Tanggal Bergabung',
//         ];
//     }
// }
