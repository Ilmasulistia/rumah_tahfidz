@extends('layouts.admin')

@section('main-content')  

@if(session('sukses'))
<div class="alert alert-success" role="alert">
      {{session('sukses')}}
</div>
@endif

<div class="container-fluid">
<div class="jumbotron">
  <h1 class="display-4">Selamat Datang!</h1>
  <p class="lead">Sistem Informasi Rumah Quran Serambi Minang</p>
  <hr class="my-4">
  <h5>Anda adalah <strong>
                @if(auth()->user()->role_id == 1)<a>Pengurus</a>
                @elseif(auth()->user()->role_id == 2)<a>Guru</a>
                @elseif(auth()->user()->role_id == 3)<a>Santri</a>
                @else<a>Kepala</a>
                @endif
  </strong></h5>
</div>
<div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Santri</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$student}}</div>
                            <a href="/datakelaslengkap" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Guru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$teacher}}</div>
                            <a href="/datapengajar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Program</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$course}}</div>
                                    <a href="/datacourse" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Hafalan Santri</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                <a href="/hafalansantri" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Sistem Informasi Rumah Quran Serambi Minang</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
@endsection
@section('javascript')            
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
@endsection
