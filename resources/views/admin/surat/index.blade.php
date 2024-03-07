@extends('layouts.dashboard')
@section('title', 'Surat')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<style>
    div.dt-container {
        width: 800px;
        margin: 0 auto;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">SURAT</h4>
                    <a href="{{ route('dashboard.surat.create') }}" class="btn btn-primary mb-4 btn-rounded text-white float-end"><i class="fas fa-plus text-small"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center cell-border nowrap stripe hover" id="table_surat" style="width: 100%">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Nomor SPPD</td>
                            <td class="text-center">Tanggal</td>
                            <td class="text-center">Nama Personil</td>
                            <td class="text-center">Tujuan</td>
                            {{-- <td class="text-center">DP</td>
                            <td class="text-center">Total</td> --}}
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
            scrollX: true,  
            ajax: {
            'url': $('#data_surat').val(),
        },
        columns: [
            { data: 'DT_RowIndex',name: 'DT_RowIndex',orderable: false,searchable: false},
            { data: 'nomor_surat', name: 'nomor_surat'},
            { data: 'created_at', name: 'created_at'},
            { data: 'pegawai_names', name: 'pegawai.name'},
            { data: 'tempat_tujuan', name: 'tempat_tujuan'},
            { data: 'options',name: 'options', orderable: false, searchable: false }
        ],
    });
    $('#table_surat').on('click', '#btn-delete', function () {
        var slug = $(this).data('id');
        var url = '{{ route("dashboard.surat.destroy", ":slug") }}'; // Use the correct route name "destroy"
        url = url.replace(':slug', slug);
        swal({
            title: 'Anda yakin?',
            text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Send a DELETE request
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        slug: slug,
                    },
                    cache: false,
                    success: function (data) {
                        if (data.success) {
                            swal('Berhasil', data.success, 'success').then(() => {
                                reloadTable('#table_surat');
                            });
                        } else if (data.message) {
                            swal('Error', data.message, 'error');
                            reloadTable('#table_surat');
                        } else {
                            swal('Error', 'Gagal menghapus surat', 'error');
                            reloadTable('#table_surat');
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        swal('Error', 'Gagal menghapus surat', 'error');
                    }
                });
            } else {
                // If the user cancels the deletion, do nothing
            }
        });
    });
});
</script>
@endpush
@endsection
