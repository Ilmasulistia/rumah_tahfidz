@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Pengajar</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('management.update', $management_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="nik" value="{{ $teacher->nik }}" class="form-control">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Periode Mulai</strong>
                    <input type="text" name="start_periode" value="{{ $management->start_periode }}" class="form-control"
                        placeholder="Periode Mulai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan</strong>
                    <input type="text" name="position" value="{{ $management->position }}" class="form-control"
                        placeholder="Jabatan">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
