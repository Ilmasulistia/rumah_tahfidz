@extends('layouts.admin')

@section('main-content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif

<!-- Content Header (Page header) -->
@if($roles == 1)
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kelola kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endif
@if($roles == 2)
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endif
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
                        data-target="#exampleModal">Tambah Data kelas</button>
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
                                <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Program</th>
                                            <th scope="col">Guru Pengampu</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($classes as $class)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$class->semester}}</td>
                                            <td>{{$class->year}}</td>
                                            <td>{{$class->course->course_name}}</td>
                                            <td>{{$class->teacher->name}}</td>
                                            <td>
                                                @if($roles == 2)
                                                <a href="laporan/{{$class->class_id}}"
                                                    class="btn btn-primary btn-sm">Lihat Kelas</i> </a>
                                                @endif
                                                @if($roles == 1)
                                                <a href="laporan/{{$class->class_id}}"
                                                    class="btn btn-primary btn-sm">Isi Kelas</i> </a>
                                                <a href="{{route('class.edit', [$class->class_id])}}"
                                                class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </a>

                                                <form action="{{route('class.delete',[$class->class_id]) }}"
                                                    method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row mb-2">
                                <div class="col-12">
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div><!-- /.container-fluid -->
</section><!-- Main content -->


<!-- Modal -->
<!-- Modal Input-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="/datakelas/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                    <label @error('semester') class="text-danger" @enderror>Semester @error('semester')
                        | {{$message}}
                        @enderror</label>
                    <select name="semester" class="form-control" placeholder="semester" value="{{old('semester')}}">
                        <option selected disabled readonly>-Semester-</option>
                        <option >1</option>
                        <option >2</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label @error('year') class="text-danger" @enderror>Tahun @error('year')
                            | {{$message}}
                            @enderror</label>
                        <input name="year" type="text" class="form-control" placeholder="Tahun">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Guru</label>
                        <select name="nik" class="form-control" id="nik">
                            @foreach($teacher as $teach)
                            <option value="{{$teach->nik}}">{{$teach->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Program</label>
                        <select name="course_id" class="form-control" id="course_id">
                            @foreach($course as $course)
                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
@section('mscript')
<script>
    $(document).ready(function () {
        $('#tbpas').DataTable();
    });

</script>

@endsection
