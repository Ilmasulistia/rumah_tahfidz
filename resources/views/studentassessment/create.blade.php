@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Masukkan Penilaian</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('laporan.update')}}">
                @csrf
                @method('PATCH')
                <input name="class_id" type="hidden" class="form-control" placeholder="Id kelas" value='$class_id'>
                <div class="form-group">
                    <label @error('class') class="text-danger" @enderror>Kelas @error('class')
                        | {{$message}}
                        @enderror</label>
                    <input name=class class="form-control" placeholder="Kelas" value="{{old('class')}}">
                </div>
                <div class="form-group">
                    <label @error('number_of_memorization') class="text-danger" @enderror>Jumlah Hafalan @error('number_of_memorization')
                        | {{$message}}
                        @enderror</label>
                    <input name=number_of_memorization class="form-control" placeholder="Jumlah Hafalan" value="{{old('number_of_memorization')}}">
                </div>
                <div class="form-group">
                    <label @error('behavior') class="text-danger" @enderror>Kelakuan @error('behavior')
                        | {{$message}}
                        @enderror</label>
                    <select name="behavior" class="form-control" placeholder="Kelakuan" value="{{old('behavior')}}">
                        <option selected disabled readonly>-Kelakuan-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('dilligence') class="text-danger" @enderror>Kerajinan @error('dilligence')
                        | {{$message}}
                        @enderror</label>
                    <select name="dilligence" class="form-control" placeholder="Kerajinan" value="{{old('dilligence')}}">
                        <option selected disabled readonly>-Kerajinan-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('neatness') class="text-danger" @enderror>Kerapian @error('neatness')
                        | {{$message}}
                        @enderror</label>
                    <select name="neatness" class="form-control" placeholder="Kerapian" value="{{old('neatness')}}">
                        <option selected disabled readonly>-Kerapian-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('ibadah') class="text-danger" @enderror>Ibadah @error('ibadah')
                        | {{$message}}
                        @enderror</label>
                    <select name="ibadah" class="form-control" placeholder="Ibadah" value="{{old('ibadah')}}">
                        <option selected disabled readonly>-Ibadah-</option>
                        <option>baik</option>
                        <option>cukup</option>
                        <option>kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('note') class="text-danger" @enderror>Catatan/Nasehat @error('note')
                        | {{$message}}
                        @enderror</label>
                        <textarea name=note class="form-control" placeholder="Catatan/Nasehat" rows="7"
                            value="{{old('note')}}"></textarea>
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
