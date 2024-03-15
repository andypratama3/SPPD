@extends('layouts.dashboard')
@section('title', 'Edit Sbm')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">Edit SBM</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.sbm.update', $sbm->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{ $sbm->slug }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Biaya <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="biaya"
                                    placeholder="Masukan Nama Biaya" value="{{ $sbm->biaya }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Daerah <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="daerah"
                                    placeholder="Masukan Daerah " value="{{ $sbm->daerah }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="satuan"
                                    placeholder="Masukan Satuan" value="{{ $sbm->satuan }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nilai <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="nilai"
                                    placeholder="Contoh: Makana: Rp. 20000" value="{{ $sbm->nilai }}">
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
