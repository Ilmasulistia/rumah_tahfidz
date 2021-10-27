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
                                                        <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                            @elseif($roles == 2)
                                            <td>
                                                <a href="{{route('student.show', [$assessment->student_id])}}"
                                                class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                                
                                            </td>
                                            <td>
                                                <a href="/detaillaporan/create" class="btn btn-primary btn-sm">Isi Rapor</i> </a>
                                                <a href="#"
                                                data-toggle="modal" type="button" data-original-title="Edit" id="editKeterangan"
                                                data-target="#inputKeterangan" class="btn btn-primary btn-sm"
                                                data-student_assessment_id="{{$assessment->student_assessment_id}}"
                                                data-student_id="{{$assessment->student_id}}"
                                                    data-class_id="{{$assessment->class_id}}"
                                                    data-number_of_memorization="{{$assessment->number_of_memorization}}"
                                                    data-behavior="{{$assessment->behavior}}"
                                                    data-dilligence="{{$assessment->dilligence}}"
                                                    data-neatness="{{$assessment->neatness}}"
                                                    data-ibadah="{{$assessment->ibadah}}" 
                                                    data-note="{{$assessment->note}}"
                                                    data-class="{{$assessment->class}}">Keterangan</i> </a>

                                                    <a href="{{route('laporan.create', [$assessment->student_assessment_id])}}"
                                                class="btn btn-info btn-sm">Detail<i class="fas fa-info-circle"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('penilaian.create', [$assessment->student_id, $assessment->class_id])}}"
                                                class="btn btn-secondary btn-sm">Isi batas hafalan</i> </a>
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

<!-- Modal Add Keterangan-->
<div class="modal fade" id="inputKeterangan" tabindex="-1" aria-labelledby="inputKeteranganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputKeteranganLabel">Masukkan Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form method="POST"action="#">
                @csrf
                @method('PATCH')
                <input name="student_assessment_id" id="edit_student_assessment_id"  class="form-control" placeholder="Id student" >
                <input name="student_id" id="edit_student_id"  class="form-control" placeholder="Id student" value='{{$student_id}}'>
                <input name="class_id" id="edit_class_id"  class="form-control" placeholder="Id kelas" value='{{$class_id}}'>
                <div class="form-group">
                    <label @error('class') class="text-danger" @enderror>Kelas @error('class')
                        | {{$message}}
                        @enderror</label>
                    <input name=class id="edit_class" class="form-control" placeholder="Kelas" value="{{old('class')}}">
                </div>
                <div class="form-group">
                    <label @error('number_of_memorization') class="text-danger" @enderror>Jumlah Hafalan @error('number_of_memorization')
                        | {{$message}}
                        @enderror</label>
                    <input name=number_of_memorization id="edit_number_of_memorization" class="form-control" placeholder="Jumlah Hafalan" value="{{old('number_of_memorization')}}">
                </div>
                <div class="form-group">
                    <label @error('behavior') class="text-danger" @enderror>Kelakuan @error('behavior')
                        | {{$message}}
                        @enderror</label>
                    <select name="behavior" id="edit_behavior" class="form-control" placeholder="Kelakuan" value="{{old('behavior')}}">
                        <option selected disabled readonly>-Kelakuan-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('dilligence') class="text-danger" @enderror>Kerajinan @error('dilligence')
                        | {{$message}}
                        @enderror</label>
                    <select name="dilligence" id="edit_dilligence" class="form-control" placeholder="Kerajinan" value="{{old('dilligence')}}">
                        <option selected disabled readonly>-Kerajinan-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('neatness') class="text-danger" @enderror>Kerapian @error('neatness')
                        | {{$message}}
                        @enderror</label>
                    <select name="neatness" id="edit_neatness" class="form-control" placeholder="Kerapian" value="{{old('neatness')}}">
                        <option selected disabled readonly>-Kerapian-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('ibadah') class="text-danger" @enderror>Ibadah @error('ibadah')
                        | {{$message}}
                        @enderror</label>
                    <select name="ibadah" id="edit_ibadah" class="form-control" placeholder="Ibadah" value="{{old('ibadah')}}">
                        <option selected disabled readonly>-Ibadah-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('note') class="text-danger" @enderror>Catatan/Nasehat @error('note')
                        | {{$message}}
                        @enderror</label>
                        <textarea name=note id="edit_note" class="form-control" placeholder="Catatan/Nasehat" rows="7"
                            value="{{old('note')}}"></textarea>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="return confirm('anda yakin?')">Batal</button>
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

<script>
   
    $(document).ready(function () {
                $(document).on("click", "#editKeterangan", function () {
                    var student_assessment_id=$(this).data("student_assessment_id");
                    var student_id=$(this).data("student_id");
                    var class_id=$(this).data("class_id");
                    var number_of_memorization=$(this).data("number_of_memorization");
                    var behavior=$(this).data("behavior");
                    var dilligence=$(this).data("dilligence");
                    var neatness=$(this).data("neatness");
                    var ibadah=$(this).data("ibadah");
                    var note=$(this).data("note");
                    var class=$(this).data("class");
                    $("#edit_student_assessment_id").val(student_assessment_id);
                    $("#edit_student_id").val(student_id);
                    $("#edit_class_id").val(class_id);
                    $("#edit_number_of_memorization").val(number_of_memorization);
                    $("#edit_behavior").val(behavior);
                    $("#edit_dilligence").val(dilligence);
                    $("#edit_neatness").val(neatness);
                    $("#edit_ibadah").val(ibadah);
                    $("#edit_note").val(note);
                    $("#edit_class").val(class);
                    
                    console.log(student_assessment_id);


                })
            })
</script>




@endsection
