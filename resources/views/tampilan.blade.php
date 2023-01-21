@extends('layouts.app')
@section('action')
@endsection
@section('content')

    <div class="nk-fmg-body-head d-none d-lg-flex">
        <div class="nk-fmg-search">
            <!-- <em class="icon ni ni-search"></em> -->
            <!-- <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders"> -->
            <h4 class="card-title text-primary"><i class='{{ $icon }}' data-toggle='tooltip' data-placement='bottom'
                    title='{{ $subtitle }}'></i> {{ strtoupper($subtitle) }}</h4>
        </div>
        <div class="nk-fmg-actions">
            <div class="btn-group">
                <!-- <a href="#" target="_blank" class="btn btn-sm btn-success"><em class="icon ti-files"></em> <span>Export Data</span></a> -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Modal Default</button> -->
                <!-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalDefault"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="filtershow()"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
                <a href="{{ route('crud.index') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em
                        class="icon fas fa-arrow-left"></em> <span>Kembali</span></a>
            </div>
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
            <div class="row gy-3">

            </div>
        </div>
        <!-- <div class="card-footer" style="background:#fff" align="right"> -->
        <div class="card-footer" style="background:#f7f9fd; padding-top:0px !important;">
            <div class="btn-group">
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-dark" onclick="filterclear()"><em class="icon ti-eraser"></em> <span>Clear Filter</span></a> -->
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="filterdata()"><em
                        class="icon ti-reload"></em> <span>Submit Filter</span></a>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <form method="get"  action="{{ route('crud.search') }}">
                <input type="text" name="cari" placeholder="Cari Data Aduan Anda" value="{{old('cari')}}">
                <input type="submit" value="SEARCH">
        </form>
        <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor Aduan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Pengaduan</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $aduans)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $aduans->nomor }}</td>
                    <td>{{ $aduans->tanggal }}</td>
                    <td>{{ $aduans->aduan }}</td>
                    <td>{{ $aduans->aduan_foto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endsection



