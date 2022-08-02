@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Detail rogram</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('program.update', $program_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="program_id" value="{{ $program->program_id }}" class="form-control">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Nama Detail Program</strong>
                <input type="text" name="program_name" value="{{ $program->program_name }}" class="form-control" placeholder="Nama Detail Program" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
