@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Santri</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('student.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label @error('user_id') class="text-danger" @enderror>Id @error('user_id')
                        | {{$message}}
                        @enderror</label>
                    <input name="user_id" type="text" class="form-control" placeholder="ID Santri"
                        value="{{old('user_id')}}" required>
                </div>
                <div class="form-group">
                    <label @error('username') class="text-danger" @enderror>Username @error('username')
                        | {{$message}}
                        @enderror</label>
                    <input name="username" type="text" class="form-control" placeholder="Username"
                        value="{{old('username')}}" required>
                </div>
                <div class="form-group">
                    <label @error('email') class="text-danger" @enderror>Email @error('email')
                        | {{$message}}
                        @enderror</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{old('email')}}" required>
                </div>
                <div class="form-group">
                    <label @error('name') class="text-danger" @enderror>Nama @error('name')
                        | {{$message}}
                        @enderror</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label @error('gender') class="text-danger" @enderror>Jenis Kelamin @error('gender')
                        | {{$message}}
                        @enderror</label>
                    <select name="gender" class="form-control" placeholder="Jenis Kelamin" value="{{old('gender')}}" required>
                        <option selected disabled readonly>-Jenis Kelamin-</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label @error('school_name') class="text-danger" @enderror>Asal Sekolah @error('school_name')
                        | {{$message}}
                        @enderror</label>
                    <input name="school_name" type="text" class="form-control" placeholder="Asal Sekolah"
                        value="{{old('school_name')}}" required>
                </div>
                <div class="form-group">
                    <label @error('address') class="text-danger" @enderror>Alamat @error('address')
                        | {{$message}}
                        @enderror</label>
                    <textarea name=address class="form-control" placeholder="Alamat" rows="2"
                        value="{{old('address')}}" required></textarea>
                </div>
                <div class="form-group">
                    <label @error('birth_place') class="text-danger" @enderror>Tempat Lahir @error('birth_place')
                        | {{$message}}
                        @enderror</label>
                    <input name="birth_place" type="numbtexter" class="form-control" placeholder="Tempat Lahir"
                        value="{{old('birth_place')}}" required>
                </div>
                <div class="form-group">
                    <label @error('birth_date') class="text-danger" @enderror>Tanggal Lahir @error('birth_date')
                        | {{$message}}
                        @enderror</label>
                    <div class="input-group">
                        <input name="birth_date" type="text" class="date form-control" placeholder="Tanggal Lahir"
                            value="{{old('birth_date')}}" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label @error('parents_name') class="text-danger" @enderror>Nama Orangtua @error('address')
                            | {{$message}}
                            @enderror</label>
                        <textarea name=parents_name class="form-control" placeholder="Nama Orangtua" rows="2"
                            value="{{old('parents_name')}}" required></textarea>
                    </div>
                    <div class="form-group">
                        <label @error('phone_no') class="text-danger" @enderror>Nomor HP @error('phone_no')
                            | {{$message}}
                            @enderror</label>
                        <input name="phone_no" type="numbtexter" class="form-control" placeholder="Nomor HP"
                            value="{{old('phone_no')}}" required>
                    </div>
                    <div class="form-group">
                        <label @error('parent_occupation') class="text-danger" @enderror>Pekerjaan Orangtua
                            @error('parent_occupation')
                            | {{$message}}
                            @enderror</label>
                        <textarea name=parent_occupation class="form-control" placeholder="Pekerjaan Orangtua" rows="2"
                            value="{{old('parent_occupation')}}" required></textarea>
                    </div>
                    <div class="form-group">
                        <label @error('tuition_fee') class="text-danger" @enderror>SPP @error('tuition_fee')
                            | {{$message}}
                            @enderror</label>
                        <input name="tuition_fee" class="form-control" placeholder="SPP" value="{{old('tuition_fee')}}" required>
                    </div>
                    <div class="form-group">
                        <label @error('join_date') class="text-danger" @enderror>Tanggal Bergabung @error('join_date')
                            | {{$message}}
                            @enderror</label>
                        <div class="input-group">
                            <input name="join_date" type="text" class="date form-control"
                                placeholder="Tanggal Bergabung" value="{{old('join_date')}}" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
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
