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
                <h3 class="m-0 text-dark">Laporan Hasil Belajar Santri</h3>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">    
                            <div class="alert alert-warning alert-dismissable">
                                <h4>
                                    <i class="icon fa fa-info"></i>
                                    Informasi!
                                </h4>
                                <ul style="list-style: square;margin-left: -25px;font-size: 14px;">
                                    <li>
                                        Maaf Anda Tidak Dapat Melihat Rapor
                                    </li>
                                    <li>
                                        Masih Dalam Periode Pengisian Rapor
                                    </li>
                                    <li>
                                        Atau Ada Masalah Dalam Pengisian Rapor Anda
                                    </li>
                                    <li>
                                        Silahkan Hubungi Guru Yang Bersangkutan
                                    </li>
                                </ul>
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
