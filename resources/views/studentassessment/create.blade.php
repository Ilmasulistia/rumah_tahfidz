@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Masukkan Penilaian</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('laporan.update', $student_assessment_id)}}">
                @csrf
                @method('PATCH')
                <input name="student_assessment_id" type="hidden" class="form-control" placeholder="Id student"
                    value="{{$student_assessment->student_assessment_id}}">
                <input name="student_id" type="hidden" class="form-control" placeholder="Id student"
                    value="{{$student_assessment->student_id}}">
                <input name="class_id" type="hidden" class="form-control" placeholder="Id kelas"
                    value='{{$student_assessment->class_id}}'>
                <input name="status" type="hidden" class="form-control" placeholder="status"
                    value="0">
                <input name="condition" type="hidden" class="form-control" placeholder="condition"
                    value="In Review">
                <div class="form-group">
                    <label @error('class') class="text-danger" @enderror>Kelas @error('class')
                        | {{$message}}
                        @enderror</label>
                    <input name=class class="form-control" placeholder="Kelas" value="{{old('class')}}" required>
                </div>
                <div class="form-group">
                    <label @error('number_of_memorization') class="text-danger" @enderror>Jumlah Hafalan
                        @error('number_of_memorization')
                        | {{$message}}
                        @enderror</label>
                    <input name=number_of_memorization class="form-control" placeholder="Jumlah Hafalan"
                        value="{{old('number_of_memorization')}}" required>
                </div>
                <div class="form-group">
                    <label @error('behavior') class="text-danger" @enderror>Kelakuan @error('behavior')
                        | {{$message}}
                        @enderror</label>
                    <select name="behavior" class="form-control" placeholder="Kelakuan" value="{{old('behavior')}}" required> 
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
                    <select name="dilligence" class="form-control" placeholder="Kerajinan"
                        value="{{old('dilligence')}}" required>
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
                    <select name="neatness" class="form-control" placeholder="Kerapian" value="{{old('neatness')}}" required>
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
                    <select name="ibadah" class="form-control" placeholder="Ibadah" value="{{old('ibadah')}}" required>
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
                        value="{{old('note')}}" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="return confirm('anda yakin?')">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</form>
</div>

@stop
