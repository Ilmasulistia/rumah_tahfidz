@extends('layouts.admin')

@section('main-content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5>
                        <div class="card-header">
                            <div class="d-flex">
                                Laporan Hasil Belajar Santri
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>A. Nilai</th>
                            </tr>
                            <tr>
                                <th>1. Qira'at (Bacaan Al-Qur'an)</th>
                                <td>Makharijul Huruf/Kefasihan : </td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <td>:</td>
                                <td>{{ $student->student_id }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>{{ $student->gender }}</td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td>:</td>
                                <td>{{ $student->school_name }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>:</td>
                                <td>{{ $student->birth_place }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ $student->birth_date }}</td>
                            </tr>
                            <tr>
                                <th>Nama Orangtua</th>
                                <td>:</td>
                                <td>{{ $student->parents_name }}</td>
                            </tr>
                            <tr>
                                <th>No Hp</th>
                                <td>:</td>
                                <td>{{ $student->phone_no }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Orangtua</th>
                                <td>:</td>
                                <td>{{ $student->parent_occupation }}</td>
                            </tr>
                            <tr>
                                <th>SPP</th>
                                <td>:</td>
                                <td>{{ $student->tuition_fee }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Bergabung</th>
                                <td>:</td>
                                <td>{{ $student->join_date }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection