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
                <h2 class="m-0 text-dark">Data Guru</h2>
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
                    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah Data Guru</a>
                    <a href="{{route('teacher.export')}}" class="btn btn-success btn-sm">Export</a>
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                @elseif($roles == 4)
                <a></a>
                <a href="{{route('teacher.export')}}" class="btn btn-success btn-sm">Export</a>
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
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor HP</th>
                                            @if($roles == 1)
                                            <th scope="col">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teacher as $teach)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$teach->name}}</td>
                                            <td>{{$teach->address}}</td>
                                            <td>{{$teach->phone_no}}</td>
                                            @if($roles == 1)
                                            <td>
                                            <a href="{{route('teacher.edit', [$teach->nik])}}"
                                                        class="btn btn-success btn-sm"><i
                                                            class="fas fa-edit"></i> </a>

                                            <form action="{{route('teacher.delete',[$teach->nik]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
</div>
</section><!-- Main content -->
<!-- Modal -->


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
