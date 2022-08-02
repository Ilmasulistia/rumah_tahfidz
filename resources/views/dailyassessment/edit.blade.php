@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Edit Batas Hafalan</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('penilaian.update')}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="daily_assessment_id" value="{{ $daily_assessment->daily_assessment_id }}" class="form-control">
            <input type="hidden" name="student_assessment_id" value="{{ $daily_assessment->student_assessment_id }}" class="form-control">
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Setoran</strong>
                <input type="text" name="date_of_recitation" value="{{ $daily_assessment->date_of_recitation }}" class="form-control"
                    placeholder="Tanggal Setoran">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Juz</strong>
                <select name="juz_no" class="form-control" id="juz_no">
                            @foreach($sura as $sura)
                            <option value="{{$sura->juz_no}}">{{$sura->juz_no}}</option>
                            @endforeach
                        </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Halaman</strong>
                <input type="text" name="page_no" value="{{ $daily_assessment->page_no }}"
                    class="form-control" placeholder="Halaman">
            </div>
        </div>
        <td>Bagian 1 : @if($daily_assessment->part1 == "Belum Setor")
            <a href="{{ route('penilaian.part1',[$daily_assessment->daily_assessment_id]) }}" 
                class="btn btn-danger btn-sm" class="btn btn-danger" ><span
                    class="cil-check-circle btn-icon mr-2"></span> Belum Setor</a>
            @else
            <a href="{{ route('penilaian.part1',[$daily_assessment->daily_assessment_id]) }}" 
                class="btn btn-primary btn-sm disabled"  class="btn btn-primary" ><span
                    class="cil-check-circle btn-icon mr-2"></span>Sudah Setor</a>
            @endif</td>
        <br><br>

        <td>Bagian 2 : @if($daily_assessment->part2 == "Belum Setor")
            <a href="{{ route('penilaian.part2',[$daily_assessment->daily_assessment_id]) }}" 
                class="btn btn-danger btn-sm" class="btn btn-danger" ><span
                    class="cil-check-circle btn-icon mr-2"></span> Belum Setor</a>
            @else
            <a href="{{ route('penilaian.part2',[$daily_assessment->daily_assessment_id]) }}" 
                class="btn btn-primary btn-sm disabled"  class="btn btn-primary" ><span
                    class="cil-check-circle btn-icon mr-2"></span>Sudah Setor</a>
            @endif</td>
        <br><br>

        <td>Bagian 3 : @if($daily_assessment->part3 == "Belum Setor")
            <a href="{{ route('penilaian.part3',[$daily_assessment->daily_assessment_id]) }}" 
                class="btn btn-danger btn-sm" class="btn btn-danger" ><span
                    class="cil-check-circle btn-icon mr-2"></span> Belum Setor</a>
            @else
            <a href="{{ route('penilaian.part3',[$daily_assessment->daily_assessment_id]) }}" 
                class="btn btn-primary btn-sm disabled"  class="btn btn-primary" ><span
                    class="cil-check-circle btn-icon mr-2"></span>Sudah Setor</a>
            @endif</td>
        <br><br>

        
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>



    </div>
    @section('javascript')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });

</script>
@stop
    @endsection
