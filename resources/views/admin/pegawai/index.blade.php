@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">Pegawai</h4>
                    <a href="{{ route('dashboard.pegawai.create') }}" class="btn btn-primary btn-rounded btn-fw mb-4" style="float: inline-end; margin-right: 14px;"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <table class="table table-striped table-responsive" id="table_pegawai">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Nip</td>
                        <td>Action</td>
                    </tr>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>
    $(document).ready(function () {
        // const table_pegawai = new DataTable('#table_pegawai',{

        // });
    });
</script>
@endpush
@endsection
