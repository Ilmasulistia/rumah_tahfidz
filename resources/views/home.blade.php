@extends('layouts.admin')

@section('main-content')

<div class="container-fluid">
<div class="jumbotron">
  <h1 class="display-4">Selamat Datang!</h1>
  <p class="lead">Sistem Informasi Rumah Quran Serambi Minang</p>
  <hr class="my-4">
  <h5>Anda adalah <strong>{{auth()->user()->role->name}}</strong></h5>

</div>
@endsection
