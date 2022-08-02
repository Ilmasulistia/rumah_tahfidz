@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Isi Batas Hafalan</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('penilaian.store', $student_assessment_id)}}"
                enctype="multipart/form-data">
                @csrf
                <input name="student_assessment_id" type="hidden" class="form-control" placeholder="Id santri"
                    value="{{$student_assessment->student_assessment_id}}">
                <div class="form-group">
                    <label @error('date_of_recitation') class="text-danger" @enderror>Tanggal Setoran
                        @error('date_of_recitation')
                        | {{$message}}
                        @enderror</label>
                    <div class="input-group">
                        <input name="date_of_recitation" type="text" class="date form-control"
                            placeholder="Tanggal Setoran" value="{{old('date_of_recitation')}}" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Juz</label>
                        <select name="juz_no" class="form-control" id="juz_no">
                            @foreach($sura as $sura)
                            <option value="{{$sura->juz_no}}">{{$sura->juz_no}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label @error('page_no') class="text-danger" @enderror> Halaman @error('page_no')
                            | {{$message}}
                            @enderror</label>
                        <input name=page_no class="form-control" placeholder="Halaman" value="{{old('page_no')}}"
                            required>
                    </div>
                    <td><input name="part1" type="text" style="display: none" class="form-control" value="Belum Setor">
                    </td>
                    <td><input name="part2" type="text" style="display: none" class="form-control" value="Belum Setor">
                    </td>
                    <td><input name="part3" type="text" style="display: none" class="form-control" value="Belum Setor">
                    </td>


                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Oke</button>
                        
            </form>
        </div>
    </div>
</div>
</div>

</form>
</div>

@stop
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
