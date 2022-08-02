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
                <h2 class="m-0 text-dark">Data Kepengurusan</h2>
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
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                        data-target="#exampleModal">Tambah Data Kepengurusan</button>
                        @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
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
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Periode Mulai</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($management as $manag)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$manag->nik}}</td>
                                            <td>{{$manag->teacher->name}}</td>
                                            <td>{{$manag->start_periode}}</td>
                                            <td>{{$manag->position}}</td>
                                            <td>
                                                <a href="{{route('management.edit', [$manag->management_id])}}"
                                                class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </a>

                                                <form action="{{route('management.delete',[$manag->management_id]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-alt"></i></button>
                                                </form>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah data kepengurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="/datakepengurusan/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama</label>
                        <select name="nik" class="form-control" id="nik">
                            @foreach($teacher as $teach)
                            <option value="{{$teach->nik}}">{{$teach->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label @error('start_periode') class="text-danger" @enderror>Periode Mulai
                            @error('start_periode')
                            | {{$message}}
                            @enderror</label>
                        <input name="start_periode" type="text" class="form-control" placeholder="Periode Mulai" required>
                    </div>
                    <div class="form-group">
                        <label @error('position') class="text-danger" @enderror>Jabatan @error('position')
                            | {{$message}}
                            @enderror</label>
                        <input name="position" type="text" class="form-control" placeholder="Jabatan" required>
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
