@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Program</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('course.update', $course_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="course_id" value="{{ $course->course_id }}" class="form-control">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Nama Program</strong>
                <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" placeholder="Nama course" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
