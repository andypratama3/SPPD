@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">DETAIL PEGAWAI</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.pegawai.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama <code>*</code></label>
                                <input type="text" class="form-control border-input" name="name"
                                    placeholder="Masukan Nama Karyawan" value="{{ $pegawai->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIP <code>*</code></label>
                                <input type="text" class="form-control border-input" name="nip"
                                    placeholder="Masukan Nip Karyawan" value="{{ $pegawai->nip }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jabatan <code>*</code></label>
                                <input type="text" class="form-control border-input" name="jabatan"
                                    placeholder="Masukan Jabatan Karyawan" value="{{ $pegawai->jabatan }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Golongan <code>*</code></label>
                                <input type="text" class="form-control border-input" name="golongan"
                                    placeholder="Masukan Golongan" value="{{ $pegawai->golongan }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.pegawai.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>

</script>
@endpush
@endsection
