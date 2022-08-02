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
            @if (auth()->user()->role->role_id ==2)
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{auth()->user()->teacher->name}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{auth()->user()->teacher->nik}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{auth()->user()->teacher->address}}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td>{{auth()->user()->teacher->phone_no}}</td>
            </tr>
            @endif
            @if (auth()->user()->role->role_id ==3)
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{auth()->user()->student->name}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                @if(auth()->user()->student->gender == 1)<a>Laki-laki</a>
                @else<a>Perempuan</a>
                @endif
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{auth()->user()->student->address}}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{auth()->user()->student->school_name}}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>{{auth()->user()->student->birth_place}}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{auth()->user()->student->birth_date}}</td>
            </tr>
            <tr>
                <td>Nama Orangtua</td>
                <td>:</td>
                <td>{{auth()->user()->student->parents_name}}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td>{{auth()->user()->student->phone_no}}</td>
            </tr>
            <tr>
                <td>Pekerjaan Orangtua</td>
                <td>:</td>
                <td>{{auth()->user()->student->parent_occupation }}</td>
            </tr>
            <tr>
                <td>SPP</td>
                <td>:</td>
                <td>{{auth()->user()->student->tuition_fee }}</td>
            </tr>
            <tr>
                <td>Tanggal Bergabung</td>
                <td>:</td>
                <td>{{auth()->user()->student->join_date }}</td>
            </tr>
            @endif
            <tr>
        </table>
    </div>
</div>

@endsection
