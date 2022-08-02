@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Kelas</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('class.update', $class_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <label @error('semester') class="text-danger" @enderror>Semester @error('semester')
                        | {{$message}}
                        @enderror</label>
                    <select name="semester" class="form-control" placeholder="semester" value="{{old('semester')}}" required>
                        <option selected disabled readonly>-Semester-</option>
                        <option >1</option>
                        <option >2</option>
                    </select>
                    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun</strong>
                    <input type="text" name="year" value="{{ $classes->year }}" class="form-control"
                        placeholder="Tahun" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="exampleFormControlSelect1">Guru</strong>
                <select name="nik" class="form-control" id="nik">
                    @foreach($teacher as $teach)
                    <option value="{{$teach->nik}}">{{$teach->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="exampleFormControlSelect1">Program</strong>
                <select name="course_id" class="form-control" id="course_id">
                    @foreach($course as $course)
                    <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
