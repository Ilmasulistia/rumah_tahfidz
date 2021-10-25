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
                <h1 class="m-0 text-dark">Data User</h1>
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
                                <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">ID User</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $user)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$user->user_id}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->role_id}}</td>
                                            <td>
                                                <a href="{{route('user.edit', [$user->user_id])}}"
                                                        class="btn btn-success btn-sm d-inline"><i
                                                            class="fas fa-edit"></i> </a>

                                                <form action="{{route('user.delete',[$user->user_id]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
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
