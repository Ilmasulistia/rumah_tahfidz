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
                        data-target="#exampleModal">Tambah Santri</button>
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
                                            <th>#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($daily_assessment as $daily)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$daily->student_assessment->name}}</td>
                                            <td>
                                            @if($roles == 1)
                                                <form action="{{route('penilaian.delete',[$daily->student_id]) }}"
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
                                                    <a href="{{route('penilaian.create', [$daily->student_id])}}"
                                                    class="btn btn-primary btn-sm">Isi Hafalan</i> </a>
                                                    <a href="#"
                                                    class="btn btn-warning btn-sm">Detail</i> </a>
                                                    <a href="#"
                                                    class="btn btn-warning btn-sm">Lihat</i> </a>
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
