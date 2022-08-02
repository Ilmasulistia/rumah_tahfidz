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
                <h2 class="m-0 text-dark">Batas Hafalan</h2>
                
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
                <a href="{{route('hafalan.cetak', [$student_assessment->student_assessment_id])}}"
                    class="btn btn-primary btn-sm">Cetak<i class="fas fa-print"></i></a>
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                @endif
                @if($roles == 2)
                <a href="{{route('penilaian.create', [$student_assessment->student_assessment_id])}}" class="btn btn-primary">Tambah Hafalan</a>
                <a href="{{route('hafalan.cetak', [$student_assessment->student_assessment_id])}}"
                    class="btn btn-primary btn-sm">Cetak<i class="fas fa-print"></i></a>
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
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Juz</th>
                                            <th scope="col">Halaman</th>
                                            <th scope="col">Bagian 1</th>
                                            <th scope="col">Bagian 2</th>
                                            <th scope="col">Bagian 3</th>
                                            <th scope="col">Keterangan</th>
                                            @if($roles == 1)
                                            <th scope="col">Aksi</th>
                                            @elseif($roles == 2)
                                            <th scope="col">Aksi</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($daily_assessment as $daily)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$daily->date_of_recitation}}</td>
                                            <td>{{$daily->juz_no}}</td>
                                            <td>{{$daily->page_no}}</td>
                                            <td>{{$daily->part1}}</td>
                                            <td>{{$daily->part2}}</td>
                                            <td>{{$daily->part3}}</td>
                                            <td>{{$daily->information}}</td>
                                            @if($roles == 1)
                                            <td>
                                            
                                                <form
                                                    action="{{route('penilaian.delete',[$daily->daily_assessment_id]) }}"
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
                                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                        data-target="#exampleModal">Tambah</button>
                                                <a href="{{route('penilaian.nilai', [$daily->daily_assessment_id])}}"
                                                class="btn btn-primary btn-sm">Isi</a>
                                                <a href="{{route('penilaian.edit', [$daily->daily_assessment_id])}}"
                                                    class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
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
