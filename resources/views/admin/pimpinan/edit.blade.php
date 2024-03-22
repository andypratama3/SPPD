@extends('layouts.dashboard')
@section('title', 'Edit Pimpinan')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">EDIT PIMPINAN</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.pimpinan.update', $pimpinan->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{ $pimpinan->slug }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="name"
                                    placeholder="Masukan Nama Karyawan" value="{{ $pimpinan->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIP <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="nip"
                                    placeholder="Masukan Nip Karyawan" value="{{ $pimpinan->nip }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jabatan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="jabatan"
                                    placeholder="Masukan Jabatan Karyawan" value="{{ $pimpinan->jabatan }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.datamaster.pimpinan.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-rounded float-end text-white">Submit</button>
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
