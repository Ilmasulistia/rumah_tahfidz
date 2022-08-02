<html>

<head>
    <style>
        h3.small {
            line-height: 0.7;
        }

        .page-break {
            page-break-after: always;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 9px;
            text-align: left;
        }

    </style>

</head>
<center>
    <h3 class="big">BUKU BATAS HAFALAN SANTRI </h3>
    <h3 class="big">RUMAH QUR'AN SERAMBI MINANG</h3>
    <hr size: 0.5px solid black;>
    <p class="small">Jln. DR. M. Hatta, Simpang Koto Tingga, Kel. Pasar Ambacang, Kuranji, Padang</p>
    <p class="small">0812-7000-3763</p>
    <img style="width:50%" src="{{('assets/img/logo_rqsm.png')}}">
</center>
      
<table style="width:100%" class="center">
        <tr>
            <td><strong>NAMA </td>
            <td>: </td>
            <td>{{$student_assessment->student->name}}</td>
        </tr>
        <tr>
            <td><strong>KELAS</td>
            <td>: </td>
            <td>{{$student_assessment->class}}</td>
        </tr>
        <tr>
            <td><strong>ALAMAT</td>
            <td>: </td>
            <td>{{$student_assessment->student->address}}</td>
        </tr>
        <tr>
            <td><strong>MUSYRIF/MUSYRIFAH</td>
            <td>: </td>
            <td>{{$student_assessment->classes->teacher->name}}</td>
        </tr>
    </table>

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

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 9px;
        text-align: left;
    }

</style>
<br>
<!-- <h4 class="center">خيركم من تعلم القرآن وعلمه</h4> -->
<h4 class="center">"Sebaik-baik kalian adalah orang yang belajar al_Qur'an dan mengajarkannya"</h4>
<h4 class="center">(HR Bukhari)</h4>
<br>
<div class="page-break"></div>
<h3 class="center">BIODATA LENGKAP SANTRI</h3>
<h3 class="center">RUMAH QUR'AN SERAMBI MINANG</h3>
<table style="width:100%" class="table table-borderless">
    <tr>
        <td><strong>Nama</td>
        <td>: </td>
        <td>{{$student_assessment->student->name}}</td>
    </tr>
    <tr>
        <td><strong>Alamat</td>
        <td>: </td>
        <td>{{$student_assessment->student->address}}</td>
    </tr>
    <tr>
        <td><strong>Tempat/tgl lahir</td>
        <td>: </td>
        <td>{{$student_assessment->student->birth_place}} / {{$student_assessment->student->birth_date}}</td>
    </tr>
    <tr>
        <td><strong>Sekolah/Kampus</td>
        <td>: </td>
        <td>{{$student_assessment->student->school_name}}</td>
    </tr>
    <tr>
        <td><strong>Kelas/Semester</td>
        <td>: </td>
        <td>{{$student_assessment->class}}</td>
    </tr>

    <tr>
        <td><strong>Nama Orang Tua</td>
        <td>: </td>
        <td>{{$student_assessment->student->parents_name}}</td>
    </tr>
    <tr>
        <td><strong>No HP/WA</td>
        <td>: </td>
        <td>{{$student_assessment->student->phone_no}}</td>
    </tr>
    <tr>
        <td><strong>Hobi</td>
        <td>: </td>
        <td> </td>
    </tr>
    <tr>
        <td><strong>Cita-Cita</td>
        <td>: </td>
        <td> </td>
    </tr>
    <tr>
        <td><strong>Makanan Kesukaan</td>
        <td>: </td>
        <td></td>
    </tr>
    <tr>
        <td><strong>Olahraga yang disukai</td>
        <td>: </td>
        <td> </td>
    </tr>
    <tr>
        <td><strong>Mulai dari juz</td>
        <td>: </td>
        <td> </td>
    </tr>
    <tr>
        <td><strong>Motivasi menghafal</td>
        <td>: </td>
        <td> </td>
    </tr>
</table>

<div class="page-break"></div>
<table style="width:100%">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Juz</th>
            <th>Halaman</th>
            <th>Bagian 1</th>
            <th>Bagian 2</th>
            <th>Bagian 3</th>
            <th >Ket.</th>
            <th >Paraf</th>
        </tr>
    </thead>
    <tbody>
        @foreach($daily_assessment as $daily)
        <tr>
            <td>{{$daily->date_of_recitation}}</td>
            <td>{{$daily->juz_no}}</td>
            <td>{{$daily->page_no}}</td>
            <td>{{$daily->part1}}</td>
            <td>{{$daily->part2}}</td>
            <td>{{$daily->part3}}</td>
            <td>{{$daily->information}}</td>
            <td></td>
        </tr>
        @endforeach

    </tbody>
</table>


</html>
