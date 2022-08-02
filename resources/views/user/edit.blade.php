@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('user.update', $user_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="user_id" value="{{ $user->user_id }}" class="form-control" required>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Username</strong>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="text" name="password" value="{{ $user->password }}" class="form-control"
                        placeholder="Password" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role</strong>
                    <input type="text" name="role_id" value="{{ $user->role_id }}" class="form-control"
                        placeholder="Role" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
