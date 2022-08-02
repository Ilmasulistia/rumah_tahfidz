@extends('layouts.admin')

@section('main-content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Laporan Hasil Belajar Santri</h3>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                
                <a></a>
                    @if($student_assessment->condition == "In Review")
                    <a href="{{ route('detaillaporan.condition',[$student_assessment->student_assessment_id]) }}"
                        <?php if($roles == 4): ?> class="btn btn-danger btn-sm" <?php else: ?>
                        class="btn btn-danger disabled" <?php endif; ?>><span
                            class="cil-check-circle btn-icon mr-2"></span>Belum Disetujui</a>
                    @else
                    <a href="{{ route('detaillaporan.condition',[$student_assessment->student_assessment_id]) }}"
                    <?php if($roles == 4): ?> class="btn btn-primary btn-sm" <?php else: ?>
                        class="btn btn-primary disabled" <?php endif; ?>    
                    class="btn btn-primary btn-sm disabled"><span
                            class="cil-x-circle btn-icon mr-2"></span>Disetujui</a>
                    @endif
                
                </nav>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card card-primary">

                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">
                                        <thead>

                                            <tr>
                                                <th>NAMA :
                                                <td>{{$student_assessment->student->name}}</td>
                                                <th>PROGRAM :
                                                <td>{{$student_assessment->classes->course->course_name}}</td>
                                                </th>
                                                <th>KELAS :
                                                <td>{{$student_assessment->class}}</td>
                                                <th>NAMA USTAD/ZAH :
                                                <td>{{$student_assessment->classes->teacher->name}}</td>
                                                </th>
                                            </tr>

                                        </thead>
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

                                    </style>
                                    <br>
                                    <p><strong>A. NILAI</p>
                                    <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">NO</th>
                                                <th rowspan="2">PROGRAM</th>
                                                <th rowspan="2">MATERI YANG DINILAI</th>
                                                <th colspan="2" class="center">NILAI</th>
                                                <th rowspan="2">STATUS</th>
                                            </tr>
                                            <tr>
                                                <th>ANGKA</th>
                                                <th>AFEKTIF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($student_assessment_detail as $sad)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td rowspan="5">{{$sad->program_detail->program->program_name}}</td>
                                                <td>{{$sad->program_detail->materi}}</td>
                                                <td>{{$sad->number}}</td>
                                                <td>
                                                    @if($sad->number < "41" )<a>D</a>
                                                        @elseif($sad->number < "70" )<a>C</a>
                                                            @elseif($sad->number < "86" )<a>B</a>
                                                                @else<a>A</a>
                                                                @endif
                                                </td>
                                                <td>
                                                    @if($sad->status == "In Review")
                                                    <a href="{{ route('detaillaporan.change',[$sad->student_assessment_detail_id]) }}"
                                                        <?php if($roles == 4): ?> class="btn btn-danger btn-sm"
                                                        <?php else: ?> class="btn btn-danger btn-sm disabled"
                                                        <?php endif; ?>><span
                                                            class="cil-check-circle btn-icon mr-2"></span>Belum
                                                        Disetujui</a>
                                                    @else
                                                    <a href="{{ route('detaillaporan.change',[$sad->student_assessment_detail_id]) }}"
                                                        class="btn btn-primary btn-sm disabled"><span
                                                            class="cil-x-circle btn-icon mr-2"></span>Disetujui</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                        <tr>
                                            <td><strong>10</td>
                                            <td>Jumlah Hafalan</td>
                                            <td>{{$student_assessment->number_of_memorization}}</td>
                                            <td colspan="3">Cttn:</td>
                                        </tr>
                                        <tr>
                                            <td><strong>11</td>
                                            <td>Akhlak</td>
                                            <td colspan="4">1. Kelakuan &nbsp;&nbsp; : {{$student_assessment->behavior}}
                                                <br> 2. Kerapian &nbsp; &nbsp;: {{$student_assessment->neatness}}
                                                <br> 3. Ibadah &nbsp; &nbsp; &nbsp; : {{$student_assessment->ibadah}}
                                                <br> 4. Kerajinan &nbsp; : {{$student_assessment->dilligence}}
                                        </tr>
                                    </table>
                                    <br>

                                    <div class="page-break"></div>
                                    <p><strong>B. Catatan Serta Nasehat Dari Ustad/Ustadzah</p>
                                    <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">

                                        <tr>
                                            <td>{{$student_assessment->note}}</td>
                                        </tr>

                                    </table>
                                    <br>
                                    <p><strong>C. Surah yang Sudah Dihafal Selama Belajar di Rumah Qur'an Serambi Minang
                                    </p>
                                    <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width:5%" class="center">NO</th>
                                                <th class="center">JUZ/SURAH</th>
                                                <th class="center">HALAMAN</th>
                                            </tr>
                                        </thead>
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
                                </div>
                                <div class="card-footer">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            @if($roles == 2)
                                        <td>
                                            @if($student_assessment->status == "0")
                                            <a href="{{ route('detaillaporan.status',[$student_assessment->student_assessment_id]) }}"
                                                <?php if($roles == 2): ?> class="btn btn-danger btn-sm" <?php else: ?>
                                                class="btn btn-danger disabled" <?php endif; ?>><span
                                                    class="cil-check-circle btn-icon mr-2"></span>Buka Akses Santri</a>
                                            @else
                                            <a href="{{ route('detaillaporan.status',[$student_assessment->student_assessment_id]) }}"
                                                class="btn btn-primary btn-sm disabled"><span class="cil-x-circle btn-icon mr-2"></span>Akses
                                                Santri Telah
                                                Dibuka</a>
                                            @endif
                                            <a href="{{route('laporan.cetak', [$student_assessment->student_assessment_id])}}"
                                                class="btn btn-primary btn-sm">Cetak<i class="fas fa-print"></i></a>
                                            @elseif($roles == 1)
                                            <a href="{{route('laporan.cetak', [$student_assessment->student_assessment_id])}}"
                                                class="btn btn-primary btn-sm">Cetak<i class="fas fa-print"></i></a>
                                        </td>
                                        @endif
                                    </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
    </div>
    </div>
    </div>
    </div>
    </div>
</section><!-- Main content -->




@stop

<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{asset('/js/demo/datatables-demo.js')}}"></script>
@section('mscript')
<script>
    $('.date').datepicker({
        format: 'mm-dd-yyyy'
    });


    $(document).ready(function () {
        $('#tbpas').DataTable();
    });

</script>




@endsection
