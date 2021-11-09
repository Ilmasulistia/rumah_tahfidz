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
                <h1 class="m-0 text-dark">Daftar Santri</h1>
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
                                            <th scope="col">Nama</th>
                                            @if($roles == 1)
                                            <th>Aksi</th>
                                            @elseif($roles == 2)
                                            <th scope="col">Detail Siswa</th>
                                            <th scope="col">Isi Rapor Siswa</th>
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
                                                <a href="{{route('detaillaporan.create', [$assessment->student_assessment_id])}}" class="btn btn-primary btn-sm">Isi Rapor</i> </a>
                                                <a href="{{route('laporan.create', [$assessment->student_assessment_id])}}"
                                                class="btn btn-primary btn-sm">Keterangan</i></a>
                                                <a href="#"
                                                class="btn btn-secondary btn-sm"><i class="far fa-eye"></i></a>
                                            </td>
                                            <td>
                                                
                                                <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                                                data-target="#addBatasHafalan">Isi batas hafalan</button>
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
<!-- Modal Add Batas Hafalan-->
<div class="modal fade" id="addBatasHafalan" tabindex="-1" aria-labelledby="addBatasHafalanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSantriLabel">Isi Batas Hafalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="{{route('penilaian.store')}}" method="POST">
                    {{csrf_field()}}
                    <input name="student_assessment_id" type="hidden" class="form-control" placeholder="Id santri" 
                    value="{{$assessment->student_assessment_id}}">
                    <div class="form-group">
                <label @error('date_of_recitation') class="text-danger" @enderror>Tanggal Setoran @error('date_of_recitation')
                        | {{$message}}
                        @enderror</label>
                    <div class="input-group">
                        <input name="date_of_recitation" type="text" class="date form-control" placeholder="Tanggal Setoran"
                            value="{{old('date_of_recitation')}}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Surah</label>
                        <select name="surah_no" class="form-control" id="surah_no">
                            @foreach($sura as $sura)
                            <option value="{{$sura->surah_no}}">{{$sura->surah_name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label @error('verse') class="text-danger" @enderror> Dari ayat @error('verse')
                        | {{$message}}
                        @enderror</label>
                    <input name=verse class="form-control" placeholder="Dari ayat" value="{{old('verse')}}">
                </div>
                <div class="form-group">
                    <label @error('verse_end') class="text-danger" @enderror>Sampai ayat @error('verse_end')
                        | {{$message}}
                        @enderror</label>
                    <input name=verse_end class="form-control" placeholder="Sampai ayat" value="{{old('verse_end')}}">
                </div>
                <div class="form-group">
                    <label @error('information') class="text-danger" @enderror>Keterangan @error('information')
                        | {{$message}}
                        @enderror</label>
                        <textarea name=information class="form-control" placeholder="Keterangan" rows="2"
                            value="{{old('information')}}"></textarea>
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
