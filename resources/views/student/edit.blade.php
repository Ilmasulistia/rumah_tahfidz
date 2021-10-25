@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Santri</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('student.update', $student_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="student_id" value="{{ $student->student_id }}" class="form-control">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin</strong>
                <!-- <input type="text" name="gender" value="{{ $student->gender }}" class="form-control"
                    placeholder="Jenis Kelamin"> -->
                <select name="gender" class="form-control" placeholder="Jenis Kelamin" value="{{old('gender')}}">
                    <option selected disabled readonly>-Jenis Kelamin-</option>
                    <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Asal Sekolah</strong>
                <input type="text" name="school_name" value="{{ $student->school_name }}" class="form-control"
                    placeholder="Asal Sekolah">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="address" value="{{ $student->address }}" class="form-control"
                    placeholder="Alamat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat lahir</strong>
                <input type="text" name="birth_place" value="{{ $student->birth_place }}" class="form-control"
                    placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir</strong>
                <input type="text" name="birth_date" value="{{ $student->birth_date }}" class="form-control"
                    placeholder="Tempat lahir">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Orangtua</strong>
                <input type="text" name="parents_name" value="{{ $student->parents_name }}" class="form-control"
                    placeholder="Nama Orangtua">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor HP</strong>
                <input type="text" name="phone_no" value="{{ $student->phone_no }}" class="form-control"
                    placeholder="Nomor HP">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Orangtua</strong>
                <input type="text" name="parent_occupation" value="{{ $student->parent_occupation }}"
                    class="form-control" placeholder="Pekerjaan Orangtua">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SPP</strong>
                <input type="text" name="tuition_fee" value="{{ $student->tuition_fee }}" class="form-control"
                    placeholder="SPP">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Bergabung</strong>
                <input type="text" name="join_date" value="{{ $student->join_date }}" class="form-control"
                    placeholder="Tanggal Bergabung">
            </div>
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
