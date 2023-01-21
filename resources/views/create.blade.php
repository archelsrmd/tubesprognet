{{-- https://www.positronx.io/laravel-datatables-example/ --}}

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

    <!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="card">
            <div class="card-body">
                <form id="formSimpan" method="POST" action="{{ url('crud') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Pengaduan Anda</label>
                        <input name="nomor" value="{{$nomor}}" type="text" class="form-control" id="nomor" aria-describedby="nomor" readonly="" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="Masukkan Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="alamat" aria-describedby="alamat" placeholder="Masukkan Alamat Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input name="telepon" type="text" class="form-control" id="telepon" aria-describedby="telepon" placeholder="Masukkan Telepon Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" id="email" aria-describedby="email" placeholder="Masukkan Email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_aduan" class="form-label">Jenis Pengaduan</label>
                        <select class="form-control" id="jenis-aduan"aria-label="Default select example" name="jenis_aduan">
                            <option value="0">Pilih Jenis Pengaduan</option>
                            @foreach ($jenis as $jns)
                                <option value="{{$jns->id}}">{{$jns->jenis_aduan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-13 col-sm-13 col-md-13">
                        <div class="form-group">
                            <strong>Tanggal </strong>
                            <input type="date" name="tanggal" id="tanggal" aria-describedby="tanggal"class="form-control">
                        </div>
                    <div class="mb-3">
                        <label for="pengaduan" class="form-label">Pengaduan</label>
                        <textarea input name="pengaduan" class="form-control" id="pengaduan" aria-describedby="pengaduan"placeholder="Masukkan Pengaduan Anda" required> </textarea>
    
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Foto Masalah</label>
                        <div class="form-group">
                            {{Form::file('foto')}}
                        </div>
                        <button type="button" id="buttonSubmit" onclick="confrimSubmit()"
                        class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
@endsection

@push('script')
    <script>
        function confrimSubmit() {
            CustomSwal.fire({
                icon: 'success',
                text: 'Pengaduan Anda Berhasil Dikirim. Untuk dapat melihat aduan yang dibuat dapat menggunakan nomor aduan',
                showCancelButton: true,
                confirmButtonText: 'Ok',
            }).then((result) => {
                // kalau klik simpan, submit form
                if (result.isConfirmed) {
                    $("#formSimpan").submit()
                }
            });
        }
    </script>
@endpush