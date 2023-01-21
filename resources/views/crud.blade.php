{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')
<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='{{$subtitle}}'></i>  {{strtoupper($subtitle)}}</h4>
    </div>
    <div class="nk-fmg-actions">
     
    </div>
</div>
<div class="row gy-3 d-none" id="loaderspin">
    <div class="col-md-12">
        <div class="col-md-12" align="center">
            &nbsp;
        </div>
        <div class="d-flex align-items-center">
          <div class="col-md-12" align="center">
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
          </div>
        </div>
        <div class="col-md-12" align="center">
            <strong>Loading...</strong>
        </div>
    </div>
</div>
<div class="card d-none" id="filterrow">
    <div class="card-body" style="background:#f7f9fd">
        <div class="row gy-3" >
            
        </div>
    </div>
</div>
    <!-- <div class="nk-fmg-body-content"> -->
<div class="container">
    <div class="row">
        <div class="card col">
            <div class="card-body">
                <form method="POST" action="{{ url('crud') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Pengaduan Baru</h5>
                        <p class="card-text">Silahkan buat pengaduan anda dengan klik tombol buat aduan</p>
                        <a href="{{ route('crud.create') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)">Buat Pengaduan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card col">
            <div class="card-body">
                {{-- <form method="POST" action="{{ url('crud') }}"> --}}
                    @csrf
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Lihat Pengaduan</h5>
                        <p class="card-text">Untuk dapat melihat aduan yang telah anda buat sebelumnya, silahkan masukkan nomor aduan anda.</p>
                        <a href="{{ route('crud.search') }}" class="btn btn-sm btn-primary">Lihat Pengaduan</a>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

<!-- </div> -->
@endsection
