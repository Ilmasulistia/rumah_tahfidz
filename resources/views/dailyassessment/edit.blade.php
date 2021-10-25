@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Batas Hafalan</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('penilaian.update', $daily_assessment_id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="daily_assessment_id" value="{{ $daily_assessment->daily_assessment_id }}" class="form-control">
            <input type="hidden" name="student_id" value="{{ $daily_assessment->student_id }}" class="form-control">
            <input type="hidden" name="nik" value="{{ $daily_assessment->nik }}" class="form-control">
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kelas</strong>
                <input type="text" name="class" value="{{ $daily_assessment->class }}"
                    class="form-control" placeholder="Kelas">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Setoran</strong>
                <input type="text" name="date_of_recitation" value="{{ $daily_assessment->date_of_recitation }}" class="form-control"
                    placeholder="Tanggal Setoran">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surah</strong>
                <input type="text" name="surah_no" value="{{ $daily_assessment->surah_no }}"
                    class="form-control" placeholder="Surah">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ayat</strong>
                <input type="text" name="verse" value="{{ $daily_assessment->verse }}"
                    class="form-control" placeholder="Ayat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input type="text" name="information" value="{{ $daily_assessment->information }}"
                    class="form-control" placeholder="Keterangan">
            </div>
        </div>
        
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>


    @endsection
