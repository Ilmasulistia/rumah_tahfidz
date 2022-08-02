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
                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                        data-target="#exampleModal">Tambah Data User</button>
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
                                            <td>
                                                @if($user->role_id == 1)<a>Pengurus</a>
                                                @elseif($user->role_id == 2)<a>Guru</a>
                                                @elseif($user->role_id == 3)<a>Santri</a>
                                                @else<a>Kepala</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('user.edit', [$user->user_id])}}"
                                                    class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </a>

                                                <form action="{{route('user.delete',[$user->user_id]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash-alt"></i></button>
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
<!-- Modal Input-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label @error('user_id') class="text-danger" @enderror>Id @error('user_id')
                            | {{$message}}
                            @enderror</label>
                        <input name="user_id" type="text" class="form-control" placeholder="ID User"
                            value="{{old('user_id')}}" required>
                    </div>
                    <div class="form-group">
                    <label @error('role_id') class="text-danger" @enderror>Role ID @error('role_id')
                        | {{$message}}
                        @enderror</label>
                    <select name="role_id" class="form-control" placeholder="Role" value="{{old('role_id')}}" required>
                        <option selected disabled readonly>-Role-</option>
                        <option value="1">Pengurus</option>
                        <option value="2">Guru</option>
                        <option value="3">Santri  </option>
                        <option value="4">Kepala</option>
                    </select>
                </div>
                    <div class="form-group">
                        <label @error('username') class="text-danger" @enderror>Username @error('username')
                            | {{$message}}
                            @enderror</label>
                        <input name="username" type="text" class="form-control" placeholder="Username"
                            value="{{old('username')}}" required>
                    </div>
                    <div class="form-group">
                        <label @error('email') class="text-danger" @enderror>Email @error('email')
                            | {{$message}}
                            @enderror</label>
                        <input name="email" type="email" class="form-control" placeholder="E-mail"
                            value="{{old('email')}}" required>
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

    $(document).ready(function () {
        $('#tbpas').DataTable();
    });

</script>





@endsection
