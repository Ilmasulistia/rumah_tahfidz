@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Detail Program</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('programdetail.update', $detail_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="detail_id" value="{{ $program_detail->detail_id }}" class="form-control">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Materi</strong>
                    <input type="text" name="materi" value="{{ $program_detail->materi }}" class="form-control"
                        placeholder="Materi">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    @endsection
