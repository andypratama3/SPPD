@extends('layouts.dashboard')
@section('title', 'Surat')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">Surat</h4>
                    <a href="{{ route('dashboard.surat.create') }}" class="btn btn-primary btn-rounded btn-fw mb-4" style="float: inline-end; margin-right: 14px;"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center" id="table_surat">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nomor SPPD</td>
                            <td>Tanggal</td>
                            <td>Nama Personil</td>
                            <td>Tujuan</td>
                            <td>DP</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ route('dashboard.surat.getRecords') }}" id="data_surat">
@push('javascript')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $.noConflict();
    $(document).ready(function () {
        $('#table_surat').DataTable({
        ordering: true,
        pagination: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        processing: true,
        pageLength: 100,
        ajax: {
            'url': $('#data_surat').val(),
        },
        columns: [
            { data: 'DT_RowIndex',name: 'DT_RowIndex',orderable: false,searchable: false},
            { data: 'nomor_surat', name: 'nomor_surat'},
            { data: 'created_at', name: 'created_at'},
            // { data: 'pegawai.name', name: 'pegawai.name'},
            { data: 'tempat_tujuan', name: 'tempat_tujuan'},
            { data: 'options',name: 'options', orderable: false, searchable: false }
        ],
    });

    });
</script>
@endpush
@endsection
