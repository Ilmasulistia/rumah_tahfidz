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
                <h2 class="m-0 text-dark">Daftar Santri</h2>
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
                @if($roles == 1)
                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                        data-target="#addSantri">Tambah Santri</button>
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                @endif
                @if($roles == 2)
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                @endif
                </nav>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card card-primary">

                            </div>
                            <div class="card-body">
                                <table class="display" id="tbpas" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>No</th>
                                            <th scope="col">Nama</th>
                                            @if($roles == 1)
                                            <th>Detail</th>
                                            @if($classes[0]->course_id == "C-4")
                                            <th scope="col">Rapor Santri</th>
                                            <th scope="col">Batas Hafalan</th>
                                            @endif
                                            <th>Aksi</th>
                                            @elseif($roles == 2)
                                            <th scope="col">Detail Santri</th>
                                            <th scope="col">Rapor Santri</th>
                                            <th scope="col">Batas Hafalan</th>
                                            @elseif($roles == 4)
                                            <th scope="col">Detail Santri</th>
                                            <th scope="col">Rapor Santri</th>
                                            <th scope="col">Batas Hafalan</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach($student_assessment as $assessment)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$assessment->student->name}}</td>
                                            
                                            @if($roles == 1)
                                            <td>
                                                <a href="{{route('student.show', [$assessment->student_id])}}"
                                                class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                            </td>
                                            @if($classes[0]->course_id == "C-4")
                                            <td>
                                                <a href="{{route('detaillaporan.show', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info"><i class="far fa-eye">Lihat Rapor</i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('penilaian.index', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info"><i class="far fa-eye">Lihat</i></a>
                                            </td>
                                            @endif
                                            <td>
                                            <form action="{{route('laporan.delete',[$assessment->student_id]) }}"
                                                    method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            @elseif($roles == 2)
                                            <td>
                                                <a href="{{route('student.show', [$assessment->student_id])}}"
                                                class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                                
                                            </td>
                                            <td>
                                                <a href="{{route('detaillaporan.create', [$assessment->student_assessment_id])}}" 
                                                class="btn btn-primary btn-sm">Isi Rapor</i> </a>
                                                <a href="{{route('laporan.create', [$assessment->student_assessment_id])}}"
                                                class="btn btn-primary btn-sm">Keterangan</i></a>
                                                <a href="{{route('detaillaporan.show', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info"><i class="far fa-eye">Lihat Rapor</i></a>
                                            </td>
                                            <td>
                                            <!-- <a href="{{route('penilaian.create', [$assessment->student_assessment_id])}}"
                                                class="btn btn-primary btn-sm">Isi Batas Hafalan</i></a> -->
                                                
                                                <a href="{{route('penilaian.index', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info"><i class="far fa-eye">Lihat</i></a>
                                            </td>
                                            @elseif($roles == 4)
                                            <td>
                                                <a href="{{route('student.show', [$assessment->student_id])}}"
                                                class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                                
                                            </td>
                                            <td>
                                                <a href="{{route('detaillaporan.show', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info"><i class="far fa-eye">Lihat Rapor</i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('penilaian.show', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info"><i class="far fa-eye">Lihat</i></a>
                                            </td>
                                            
                                           
                                            @endif
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row mb-2">
                                    <div class="col-12">
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
<!-- Modal Add Siswa-->
<div class="modal fade" id="addSantri" tabindex="-1" aria-labelledby="addSantriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSantriLabel">Tambah santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="{{route('add-siswa.store',[$class_id]) }}" method="POST">
                    {{csrf_field()}}
                    <input name="class_id" type="hidden" class="form-control" placeholder="Id Kelas"
                        value="{{$class_id}}">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama</label>
                        <select name="student_id" class="form-control" id="student_id">
                            @foreach($student as $stud)
                            <option value="{{$stud->student_id}}">{{$stud->name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('javascript')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
$('.date').datepicker({
        format: 'mm-dd-yyyy'
 });

$(document).ready( function () {
    $('#tbpas').DataTable();
} );
</script>



@endsection
