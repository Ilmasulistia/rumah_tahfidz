<html>

<head>
    <style>
        h3.small {
            line-height: 0.5;
        }

        .page-break {
            page-break-after: always;
        }

    </style>

</head>
<center>
    <img style="width:25%" src="{{('assets/img/logo_rqsm.png')}}">
    <h3 class="big">BUKU LAPORAN </h3>
    <h3 class="big">HASIL BELAJAR SANTRI</h3>
    <h3 class="big">RUMAH QUR'AN SERAMBI MINANG</h3>
    <p class="super-small">Jln. DR. M. Hatta, Simpang Koto Tingga, Kel. Pasar Ambacang, Kuranji, Padang</p>
    <p class="super-small">0812-7000-3763</p>
    <hr size: 1px solid black;>
</center>

<body>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 9px;
            text-align: left;

        }

    </style>
    <table style="width:100%" class="center">
        <tr>
            <td><strong>Nama</td>
            <td>: </td>
            <td>{{$student_assessment->student->name}}</td>
        </tr>
        <tr>
            <td><strong>Program</td>
            <td>: </td>
            <td>{{$student_assessment->classes->course->course_name}}</td>
        </tr>
        <tr>
            <td><strong>Kelas</td>
            <td>: </td>
            <td>{{$student_assessment->class}}</td>
        </tr>
        <tr>
            <td><strong>Alamat</td>
            <td>: </td>
            <td>{{$student_assessment->student->address}}</td>
        </tr>
    </table>
</body>

<style>
    .center {
        text-align: center;
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    @font-face {
        font-family: "amiri";
        src: url("amiri_quran.ttf");
    }

    .AR {
        font: normal 12px/20px amiri;
    }

</style>
<br>
<!-- <div class="AR">خيركم من تعلم القرآن وعلمه</div>
<h4 class="center">خيركم من تعلم القرآن وعلمه</h4> -->
<h4 class="center">"Sebaik-baik kalian adalah orang yang belajar al_Qur'an dan mengajarkannya"</h4>
<br>
<div class="page-break"></div>
<h3 class="center">BIODATA SANTRI</h3>
<table style="width:100%" class="table table-borderless">
    <tr>
        <td><strong>Nama</td>
        <td>: </td>
        <td>{{$student_assessment->student->name}}</td>
    </tr>
    <tr>
        <td><strong>Tempat/tgl lahir</td>
        <td>: </td>
        <td>{{$student_assessment->student->birth_place}} / {{$student_assessment->student->birth_date}}</td>
    </tr>
    <tr>
        <td><strong>Sekolah</td>
        <td>: </td>
        <td>{{$student_assessment->student->school_name}}</td>
    </tr>
    <tr>
        <td><strong>Kelas</td>
        <td>: </td>
        <td>{{$student_assessment->class}}</td>
    </tr>
    <tr>
        <td><strong>Alamat</td>
        <td>: </td>
        <td>{{$student_assessment->student->address}}</td>
    </tr>
    <tr>
        <td><strong>Nama Orang Tua</td>
        <td>: </td>
        <td>{{$student_assessment->student->parents_name}}</td>
    </tr>
    <tr>
        <td><strong>Pekerjaan</td>
        <td>: </td>
        <td>{{$student_assessment->student->parent_occupation}}</td>
    </tr>
    <tr>
        <td><strong>Anak ke</td>
        <td>: </td>
        <td> </td>
    </tr>
    <tr>
        <td><strong>No HP/WA</td>
        <td>: </td>
        <td>{{$student_assessment->student->phone_no}}</td>
    </tr>
    <tr>
        <td><strong>Cita-Cita</td>
        <td>: </td>
        <td> </td>
    </tr>
    <tr>
        <td><strong>Hobi</td>
        <td>: </td>
        <td> </td>
    </tr>
</table>
<div class="page-break"></div>
<center>
    <img style="width:15%" src="{{('assets/img/logo_rqsm.png')}}">
    <h3>LAPORAN HASIL BELAJAR SANTRI</h3>
    <h3>RUMAH QUR'AN SERAMBI MINANG</h3>
    <p class="super-small">Jln. DR. M. Hatta, Simpang Koto Tingga, Kel. Pasar Ambacang, Kuranji, Padang</p>
    <p class="super-small">0812-7000-3763</p>
</center>
<table style="width:100%">
    <thead>
        <tr>
            <th>NAMA &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$student_assessment->student->name}}
                <br>PROGRAM &nbsp; : {{$student_assessment->classes->course->course_name}}
            </th>
            <th>KELAS &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;: {{$student_assessment->class}}
                <br>NAMA USTAD/ZAH &nbsp; : {{$student_assessment->classes->teacher->name}}
            </th>
        </tr>
    </thead>
</table>
<p><strong>A. NILAI</p>
<table style="width:100%">
    <thead>
        <tr>
            <th rowspan="2" style="width:2%">NO</th>
            <th rowspan="2">PROGRAM</th>
            <th rowspan="2" style="width:40%">MATERI YANG DINILAI</th>
            <th colspan="2" class="center">NILAI</th>
        </tr>
        <tr>
            <th style="width:10%">ANGKA</th>
            <th style="width:10%">AFEKTIF</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student_assessment_detail as $sad)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><strong>{{$sad->program_detail->program->program_name}}</td>
            <td>{{$sad->program_detail->materi}}</td>
            <td>{{$sad->number}}</td>
            <td>
                @if($sad->number < "41" )<a>D</a>
                    @elseif($sad->number < "70" )<a>C</a>
                        @elseif($sad->number < "86" )<a>B</a>
                            @else<a>A</a>
                            @endif
            </td>
        </tr>
    </tbody>
    @endforeach
    <tr>
        <td><strong>10</td>
        <td><strong>Jumlah Hafalan</td>
        <td>{{$student_assessment->number_of_memorization}}</td>
        <td colspan="2"><strong>Cttn:</td>
    </tr>
    <tr>
        <td><strong>11</td>
        <td><strong>Akhlak</td>
        <td colspan="3"><strong>1. Kelakuan : {{$student_assessment->behavior}}
        <br><strong> 2. Kerapian : {{$student_assessment->neatness}}
        <br><strong> 3. Ibadah &nbsp;&nbsp;&nbsp;&nbsp;: {{$student_assessment->ibadah}}
        <br><strong> 4. Kerajinan : {{$student_assessment->dilligence}}
    </tr>
</table>
<br>
<p class="right"><strong>Padang, {{date('d-m-Y')}} </p>
<p class="left"><strong>Mengetahui,</p>
<p class="left"><strong>Ketua Rumah Qur'an 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Guru Kelas
</p>
<br>
<br>
<br>
<p class="left"><strong>Ust. Nofri Naldi S.IQ S.Ag
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp; {{$student_assessment->classes->teacher->name}}
</p>

<div class="page-break"></div>
<center>
    <img style="width:15%" src="{{('assets/img/logo_rqsm.png')}}">
    <h3 class="big">LAPORAN HASIL BELAJAR SANTRI</h3>
    <h3 class="big">RUMAH QUR'AN SERAMBI MINANG</h3>
    <p class="super-small">Jln. DR. M. Hatta, Simpang Koto Tingga, Kel. Pasar Ambacang, Kuranji, Padang</p>
    <p class="super-small">0812-7000-3763</p>
</center>
<p><strong>B. Catatan Serta Nasehat Dari Ustad/Ustadzah</p>
<table style="width:100%">
    <tr>
        <td>{{$student_assessment->note}}</td>
    </tr>
</table>
<br>
<p><strong>C. Surah yang Sudah Dihafal Selama Belajar di Rumah Qur'an Serambi Minang</p>
<table style="width:100%">
    <tr>
        <th class="center" style="width:5%">NO</th>
        <th class="center">JUZ/SURAH</th>
        <th class="center">HALAMAN</th>
    </tr>
    <tbody>
        @foreach($daily_assessment as $daily)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$daily->juz_no}}</td>
            <td>{{$daily->page_no}}</td>
        </tr>
    </tbody>
    @endforeach
</table>

</html>
