
@extends('layouts.dashboard')
@section('title', 'SBM')
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
                    <h4 class="text-center">SBM DATA</h4>
                    <a href="{{ route('dashboard.datamaster.sbm.create') }}" class="btn btn-primary mb-4 btn-rounded text-white float-end"><i class="fas fa-plus text-small"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center cell-border nowrap stripe hover" id="table_sbm" style="width: 100%">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Biaya</td>
                            <td class="text-center">Daerah</td>
                            <td class="text-center">Satuan</td>
                            <td class="text-center">Nilai</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ route('dashboard.sbms.records') }}" id="data_sbm">
@push('javascript')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $.noConflict();
    
    $(document).ready(function () {
        $('#table_sbm').DataTable({
            ordering: true,
            pagination: true,
            deferRender: true,
            serverSide: true,
            responsive: true,
            processing: true,
            pageLength: 100,
            scrollX: true,
            ajax: {
            'url': $('#data_sbm').val(),
        },
        columns: [
            { data: 'DT_RowIndex',name: 'DT_RowIndex',orderable: false,searchable: false},
            { data: 'biaya', name: 'biaya'},
            { data: 'daerah', name: 'daerah'},
            { data: 'satuan', name: 'satuan'},
            { data: 'nilai', name: 'nilai'},
            { data: 'options',name: 'options', orderable: false, searchable: false }
        ],
    });
    $('#table_sbm').on('click', '#btn-delete', function () {
        var slug = $(this).data('id');
        var url = '{{ route("dashboard.datamaster.sbm.destroy", ":slug") }}';
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
                    cache: false,
                    success: function (data) {
                        swal('Berhasil', data.status, 'success').then(() => {
                            reloadTable('#table_sbm');
                        });

                    },
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
