@extends('layouts.admin')

@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Isi Batas Hafalan</h6>
        </div>
        <table class="table table-bordered" id="tbpas" width="100%" cellspacing="0">
            <tbody>
                <tr>
                <td class="m-0 font-weight-bold text-primary">Tanggal : {{$daily_assessment->date_of_recitation}}</td>
                    <td class="m-0 font-weight-bold text-primary">Juz : {{$daily_assessment->juz_no}}</td>
                    <td class="m-0 font-weight-bold text-primary">Halaman : {{$daily_assessment->page_no}}</td>
                </tr>
            </tbody>
        </table>

            <div class="card-body">

                <input type="hidden" name="daily_assessment_id" value="{{ $daily_assessment->daily_assessment_id }}"
                    class="form-control">
                <input type="hidden" name="student_assessment_id" value="{{ $daily_assessment->student_assessment_id }}"
                    class="form-control">
                <input type="hidden" name="date_of_recitation" value="{{ $daily_assessment->date_of_recitation }}"
                    class="form-control">
                <input type="hidden" name="juz_no" value="{{ $daily_assessment->juz_no }}" class="form-control">
                <input type="hidden" name="page_no" value="{{ $daily_assessment->page_no }}" class="form-control">

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
            <a href="#" class="btn btn-primary">Kembali </a>
            
            
            
            
        </div>
        </form>

    </div>
</div>


    @endsection
