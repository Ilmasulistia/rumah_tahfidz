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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card card-primary">

                            </div>
                            <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                            <form method="POST" action="{{route('detaillaporan.store', $student_assessment_id)}}" enctype="multipart/form-data">
                            @csrf
                            
                                @foreach ($program as $program)
                                <tr>
                                    <th colspan="6" class="text-center" >{{$program->program_name}}</th>
                                </tr>
                                    <tr class="text-center">
                                        <th class="align-middle border-right">No</th>
                                        <th class="align-middle border-right">Materi</th>
                                        <th></th>
                                        <th></th>
                                        <th class="align-middle border-right">Nilai Angka</th>
                                        <!-- <th class="align-middle border-right">Status</th> -->
                                    </tr>
                                <tbody>
                                    @foreach ($program->program_detail as $q)
                                    <tr>
                                        <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                                        <td class="border-right">{{$q->materi}}</td>
                                        <td><input name="student_assessment_id[]" type="text" style="display: none" class="form-control" placeholder="Id santri" 
                                        value="{{$student_assessment->student_assessment_id}}"></td>
                                        <td><input name="detail_id[]" value="{{$q->detail_id}}" type="text" style="display: none" class="form-control"></td>
                                        <td><input name="number[]" type="text" class="form-control" required></td>
                                        <td><input name="status[]" type="text" style="display: none" class="form-control" value="In Review"></td>                                    
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="card-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="return confirm('anda yakin?')">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                                <div class="row mb-2">
                                    <div class="col-12">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div><!-- /.container-fluid -->
                    </div>    
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