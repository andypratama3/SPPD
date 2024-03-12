@extends('layouts.dashboard')
@section('title', 'SBM')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">TAMBAH SBM</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.sbm.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Biaya <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="name"
                                    placeholder="Masukan Nama Biaya" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Daerah <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="nip"
                                    placeholder="Masukan Nip Karyawan" value="{{ old('nip') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="jabatan"
                                    placeholder="Masukan Jabatan Karyawan" value="{{ old('jabatan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nilai <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="jabatan"
                                    placeholder="Masukan Jabatan Karyawan" value="{{ old('jabatan') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.datamaster.sbm.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button class="btn btn-primary btn-rounded float-end text-white">Submit</button>
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
