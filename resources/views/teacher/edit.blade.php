@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Guru</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('teacher.update', $nik)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="nik" value="{{ $teacher->nik }}" class="form-control" required>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" placeholder="Nama" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat</strong>
                    <input type="text" name="address" value="{{ $teacher->address }}" class="form-control"
                        placeholder="Alamat" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No HP</strong>
                    <input type="text" name="phone_no" value="{{ $teacher->phone_no }}" class="form-control"
                        placeholder="No HP" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
