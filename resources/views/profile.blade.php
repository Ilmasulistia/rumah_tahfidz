@extends('layouts.admin')

@section('main-content')

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <h5>
        <div class="card-header"><i class="fa fa-align-justify"></i>USER PROFILE</div>
    </h5>
    <div class="card-body">
        <table style="width:100%" style="border-bottom: 1px solid #ddd">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{auth()->user()->name}}</td>
            </tr>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{auth()->user()->id}}</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>{{auth()->user()->username}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{auth()->user()->email}}</td>
            </tr>
            <br>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{auth()->user()->role->name}}</td>
            </tr>
            <tr>
        </table>
        <br>
        <a href="{{route('view.changePassword')}}" class="btn btn-primary btn-sm">Ganti Password <i class="fas fa-edit"></i>
        </a>
    </div>
</div>

@endsection
