@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Masukkan Penilaian</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('penilaian.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input name="class_id" type="hidden" class="form-control" placeholder="Id kelas" value="{{$daily_assessment->class_id}}">
                <input name="class_id" type="hidden" class="form-control" placeholder="Id kelas" value="{{$daily_assessment->class_id}}">
                <div class="form-group">
                    <label @error('class') class="text-danger" @enderror>Kelas @error('class')
                        | {{$message}}
                        @enderror</label>
                    <input name=class class="form-control" placeholder="Kelas" value="{{old('class')}}">
                </div>
                <div class="form-group">
                <label @error('date_of_recitation') class="text-danger" @enderror>Tanggal Setoran @error('date_of_recitation')
                        | {{$message}}
                        @enderror</label>
                    <div class="input-group">
                        <input name="date_of_recitation" type="text" class="date form-control" placeholder="Tanggal Setoran"
                            value="{{old('date_of_recitation')}}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Surah</label>
                        <select name="surah_no" class="form-control" id="surah_no">
                            @foreach($sura as $sura)
                            <option value="{{$sura->surah_no}}">{{$sura->surah_name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label @error('verse') class="text-danger" @enderror> Dari ayat @error('verse')
                        | {{$message}}
                        @enderror</label>
                    <input name=verse class="form-control" placeholder="Dari ayat" value="{{old('verse')}}">
                </div>
                <div class="form-group">
                    <label @error('verse_end') class="text-danger" @enderror>Sampai ayat @error('verse_end')
                        | {{$message}}
                        @enderror</label>
                    <input name=verse_end class="form-control" placeholder="Sampai ayat" value="{{old('verse_end')}}">
                </div>
                <div class="form-group">
                    <label @error('information') class="text-danger" @enderror>Keterangan @error('information')
                        | {{$message}}
                        @enderror</label>
                        <textarea name=information class="form-control" placeholder="Keterangan" rows="2"
                            value="{{old('information')}}"></textarea>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="return confirm('anda yakin?')">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
