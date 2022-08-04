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
                <h2 class="m-0 text-dark">Batas Hafalan - {{ $student_assessment->student->name }}</h2>
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
                    <a href="{{route('hafalan.cetak', [$student_assessment->student_assessment_id])}}"
                        class="btn btn-primary btn-sm" target="_blank">Cetak<i class="fas fa-print"></i></a>
                    @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                    @endif
                    @if (session('Error'))
                    <div class="alert alert-danger">
                        {{ session('Error') }}
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

                                            @if($roles == 2)
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
                                            <td @if($daily['part1'] <1) style="color: red;" @endif>@if($daily->part1
                                                <=3) {{ "Sudah Setor" }} @else {{"Belum setor"}} @endif</td> <td
                                                    @if($daily['part1']==1) style="color: red;" @endif>@if($daily->part1
                                                    >=2 ) {{ "Sudah Setor" }} @else {{"Belum setor"}} @endif</td>
                                            <td @if($daily['part1'] !=3) style="color: red;" @endif>@if($daily->part1
                                                ==3) {{ "Sudah Setor" }} @else {{"Belum setor"}} @endif</td>
                                            <td>@if($daily->information == null) {{"Tanpa keterangan"}} @else
                                                {{$daily->information}} @endif</td>
                                            @if($roles == 2)


                                            <td>

                                                <!-- <a href="" class="btn btn-success btn-sm" id="editButton"
                                                    data-toggle="modal" data-target="#modalEdit"
                                                    data-id="{{$daily->daily_assessment_id}}"
                                                    data-date_of_recitation="{{$daily->date_of_recitation}}"
                                                    data-juz_no="{{$daily->juz_no}}"
                                                    data-page_no="{{$daily->page_no}}"
                                                    data-part1="{{$daily->part1}}"
                                                    data-information="{{$daily->information}}">
                                                    <i class="fas fa-edit"></i>
                                                </a> -->

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


                @if($roles == 2)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card card-primary">

                            </div>
                            <div class="card-body">
                                <h4>Isi Setoran Siswa</h4>
                                <form
                                    action="{{route('penilaian.store', [$student_assessment->student_assessment_id])}}"
                                    method="POST">
                                    @csrf

                                    <input name="student_assessment_id" type="hidden" class="form-control"
                                        placeholder="Id santri" value="{{$student_assessment->student_assessment_id}}">

                                    <div class="form-group row">
                                        <label @error('date_of_recitation') class="text-danger" @enderror
                                            class="col-md-4 col-form-label">Tanggal Setoran
                                            @error('date_of_recitation')
                                            | {{$message}}
                                            @enderror</label>
                                        </label>

                                        <div class="col-md-6 input group">
                                            <input name="date_of_recitation" type="text" class="date form-control"
                                                placeholder="Tanggal Setoran" value="{{old('date_of_recitation')}}"
                                                required>
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label">Juz Pada Alqur'an</label>

                                        <div class="col-md-6">
                                            <select name="juz_no" id="juz_no" class="form-control">
                                                <option value="">== Select Jus ==</option>
                                                @for ($z = 1; $z < 31; $z++) <option value="{{ $z }}">Juz ke-{{ $z }}
                                                    </option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label">Halaman</label>

                                        <div class="col-md-6">
                                            <select name="page_no" id="page_no" class="form-control">

                                                <option value="">== Select halaman ==</option>
                                                @for ($i = 1; $i < 21; $i++) <option value="{{ $i }}">Halaman
                                                    ke-{{ $i }}</option>
                                                    @endfor
                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label">Bagian</label>

                                        <div class="col-md-6">
                                            <select name="part1" id="part1" class="form-control">

                                                <option value="">== Select Bagian ==</option>
                                                @for ($i = 1; $i < 4; $i++) <option value="{{ $i }}">Bagian ke-{{ $i }}
                                                    </option>
                                                    @endfor
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label">Keterangan</label>

                                        <div class="col-md-6">

                                            <input name="information" class="form-control" placeholder="Keterangan">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>


                            </form>

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
            @endif


        </div>
    </div>
    </div>
</section><!-- Main content -->


<!-- Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Hafalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="{{route('penilaian.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input name="student_assessment_id" type="hidden" class="form-control" placeholder="Id santri"
                        value="{{$student_assessment->student_assessment_id}}">

                    <div class="form-group row">
                        <label @error('date_of_recitation') class="text-danger" @enderror
                            class="col-md-4 col-form-label">Tanggal Setoran
                            @error('date_of_recitation')
                            | {{$message}}
                            @enderror</label>
                        </label>

                        <div class="col-md-6 input group">
                            <input name="date_of_recitation" id="edit_date" type="text" class="date form-control"
                                placeholder="Tanggal Setoran" value="">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Juz Pada Alqur'an</label>

                        <div class="col-md-6">
                            <input name="juz_no" id="edit_juz" class="form-control" disabled>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Halaman</label>

                        <div class="col-md-6">
                            <input name="page_no" id="edit_page" class="form-control" disabled>
                            </select>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Bagian</label>

                        <div class="col-md-6">
                            <input name="part_no" id="edit_part" class="form-control" disabled>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Keterangan</label>

                        <div class="col-md-6">
                            <input name="information" type="text" class="form-control" id="edit_info">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
            </div>


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
        format: 'yyyy-mm-dd',
    });

    $(document).ready(function () {
        $('#tbpas').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'all']
            ]
        })
    });

    $(document).ready(function () {
        $(document).on("click", "#editButton", function () {
            var id = $(this).data("daily_assessment_id");
            var date = $(this).data("date_of_recitation");
            var juz = $(this).data("juz_no");
            var page = $(this).data("page_no");
            var part = $(this).data("part1");
            var information = $(this).data("information");
            $("#edit_date").val(date);
            $("#edit_juz").val("Juz Ke-" + juz);
            $("#edit_page").val("Halaman Ke -" +page);
            $("#edit_part").val("Bagian Ke -"+part);
            $("#edit_info").val(information);
            console.log(juz);
        })
    })

</script>

@endsection
