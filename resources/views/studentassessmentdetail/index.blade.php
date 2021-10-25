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
                <h1 class="m-0 text-dark">Hasil Belajar Santri</h1>
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
                                            <th>#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student_assessment as $assessment)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$assessment->student->name}}</td>
                                            <td>
                                            @if($roles == 1)
                                                    <a href="#"
                                                    class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                                    <a href="/cetak_pdf"
                                                    class="btn btn-secondary btn-sm">Cetak<i class="fas fa-print"></i> </a>
                                                <form action="{{route('laporan.delete',[$assessment->student_id]) }}"
                                                    method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                                @elseif($roles == 2)
                                                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                                                    data-target="#exampleModal">Tambah Nilai</button>
                                                    <a href="#"
                                                    class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                                    <a href="/cetak_pdf"
                                                    class="btn btn-secondary btn-sm">Cetak<i class="fas fa-print"></i> </a>
                                                @endif
                                            </td>
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
<!-- Modal Input-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nilai Rapor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="#" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Materi</label>
                        <select name="detail_id" class="form-control" id="detail_id">
                            @foreach($program_detail as $detail)
                            <option value="{{$detail->detail_id}}">{{$detail->materi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label @error('number') class="text-danger" @enderror>Angka
                            @error('number')
                            | {{$message}}
                            @enderror</label>
                        <input name="number" type="text" class="form-control" placeholder="Angka">
                    </div>
                    <div class="form-group">
                        <label @error('affective') class="text-danger" @enderror>Afektif @error('affective')
                            | {{$message}}
                            @enderror</label>
                        <input name="affective" type="text" class="form-control" placeholder="Afektif">
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
