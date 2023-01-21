@extends('layouts.app')
@section('action')
@endsection
@section('content')
<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="card">
            <div class="card-body">
                <form method="POST" id="formSimpan" action="{{ url('crud') }}/{{ $data['id'] }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" value="{{ $data['email'] }}" class="form-control" id="email"
                            aria-describedby="email">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_aduan" class="form-label">Jenis aduan</label>
                        <input name="jenis_aduan" type="text" value="{{ $data['jenis_aduan'] }}" class="form-control" id="jenis_aduan"
                            aria-describedby="jenis_aduan">
                    </div>
                    <div class="mb-3">
                        <label for="aduan" class="form-label">Pengaduan </label>
                        <input name="aduan" type="text" value="{{ $data['aduan'] }}" class="form-control"
                            id="aduan" aria-describedby="aduan">
                    </div>
                    
                    <div class="mb-3">
                        <label for="respon" class="form-label">Jawaban </label>
                        <input name="respon" type="text" value="{{ $data['respon'] }}" class="form-control"
                            id="respon" aria-describedby="respon">
                    </div>

                    <button type="button" id="buttonUpdate" onclick="confrimUpdate()"
                        class="btn btn-primary">Simpan Jawaban</button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
@endsection

@push('script')
    <script>
        // dipanggil saat klik button simpan
        function confrimUpdate() {
            CustomSwal.fire({
                icon: 'question',
                text: 'Simpan perubahan ?',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
            }).then((result) => {
                // kalau klik simpan, submit form
                if (result.isConfirmed) {
                    $("#formSimpan").submit()
                }
            });
        }
    </script>
@endpush