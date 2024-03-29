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
                <h2 class="m-0 text-dark">Data Santri</h2>
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
                    <a></a>
                    <a href="{{route('student.export')}}" class="btn btn-success btn-sm">Export</a>
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                    @elseif($roles == 4)
                    <a></a>
                    <a href="{{route('student.export')}}" class="btn btn-success btn-sm">Export</a>
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
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Asal Sekolah</th>
                                            <th scope="col">Alamat</th>
                                            <!-- <th scope="col">Tempat Lahir</th>
                                            <th scope="col">Tanggal Lahir</th> -->
                                            <!-- <th scope="col">Nama Orangtua</th>
                                            <th scope="col">Nomor HP</th>
                                            <th scope="col">Pekerjaan Orangtua</th> -->
                                            <th scope="col">SPP</th>
                                            <th scope="col">Tanggal Bergabung</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student as $stud)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$stud->name}}</td>
                                            <td>@if($stud->gender == 1)
                                                Laki-Laki
                                                @else
                                                Perempuan
                                                @endif</td>
                                            <td>{{$stud->school_name}}</td>
                                            <td>{{$stud->address}}</td>
                                            <!-- <td>{{$stud->birth_place}}</td>
                                            <td>{{$stud->birth_date}}</td> -->
                                            <!-- <td>{{$stud->parents_name}}</td>
                                            <td>{{$stud->phone_no}}</td>
                                            <td>{{$stud->parent_occupation}}</td> -->
                                            <td>{{$stud->tuition_fee}}</td>
                                            <td>{{$stud->join_date}}</td>
                                            <td>
                                            @if($roles == 1)
                                                <a href="{{route('student.show', [$stud->student_id])}}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                                                <a href="{{route('student.edit', [$stud->student_id])}}"  class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                                <form action="{{route('student.delete',[$stud->student_id]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            @elseif($roles == 4)
                                            <a href="{{route('student.show', [$stud->student_id])}}" class="btn btn-primary btn-sm">Lihat<i class="far fa-eye"></i></a>
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
