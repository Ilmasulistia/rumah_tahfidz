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
                <h3 class="m-0 text-dark">Ranking Hafalan Santri</h3>
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
                    <a href="{{route('laporan.export')}}" class="btn btn-success btn-sm">Export</a>
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                    @elseif($roles == 4)
                    <a></a>
                    <a href="{{route('laporan.export')}}" class="btn btn-success btn-sm">Export</a>
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
                                            <th scope="col">Nama Santri</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Batas Hafalan</th>
                                            <th scope="col">Guru Pengampu</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($student_assessment as $assessment)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$assessment->name}}</td>
                                                <td>{{$assessment->semester}}</td>
                                                <td>{{$assessment->year}}</td>
                                                <td></td>
                                                <td>{{$assessment->classes->teacher->name}}</td>
                                               
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