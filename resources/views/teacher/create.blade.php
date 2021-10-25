@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pengajar</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('teacher.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>NIK</label>
                    <input name="user_id" type="text" class="form-control" placeholder="NIK" value="{{old('user_id')}}">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Username"
                        value="{{old('username')}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label @error('name') class="text-danger" @enderror>Nama @error('name')
                        | {{$message}}
                        @enderror</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label @error('address') class="text-danger" @enderror>Alamat @error('address')
                        | {{$message}}
                        @enderror</label>
                    <textarea name=address class="form-control" placeholder="Alamat" rows="2"
                        value="{{old('address')}}"></textarea>
                </div>
                <div class="form-group">
                    <label @error('phone_no') class="text-danger" @enderror>Nomor HP @error('phone_no')
                        | {{$message}}
                        @enderror</label>
                    <input name="phone_no" type="numbtexter" class="form-control" placeholder="Nomor HP"
                        value="{{old('phone_no')}}">
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
