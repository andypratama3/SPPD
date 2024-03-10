@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">Detail Pegawai</h5>
            </div>
            <div class="card-body">
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
                    <div class="col-md-12">
                        <a href="{{ route('dashboard.pegawai.index') }}" class="btn btn-danger btn-xs">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>

</script>
@endpush
@endsection
