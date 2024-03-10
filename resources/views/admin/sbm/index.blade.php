@extends('layouts.dashboard')
@section('title', 'SBM')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">SBM</h4>
                    <a href="{{ route('dashboard.datamaster.sbm.create') }}" class="btn btn-primary btn-rounded float-end text-white"><i class="fas fa-plus text-small"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center" id="table_sbm">
                    <tr>
                        <td>No</td>
                        <td>Biaya</td>
                        <td>Daerah</td>
                        <td>Satuan</td>
                        <td>Nilai</td>
                        <td>Action</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>
    $(document).ready(function () {

    });
</script>
@endpush
@endsection
