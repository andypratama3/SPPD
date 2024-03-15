@extends('layouts.dashboard')
@section('title', 'Rincian Biaya')
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
                    <h4 class="text-center">Rincian Biaya</h4>
                    {{-- <a href="{{ route('dashboard.surat.create') }}" class="btn btn-primary mb-4 btn-rounded text-white float-end"><i class="fas fa-plus text-small"></i> Tambah</a> --}}
                </div>
                <table class="table table-responsive text-center cell-border nowrap stripe hover" id="table_rincian_biaya" style="width: 100%">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Nomor SPPD</td>
                            <td class="text-center">DP</td>
                            <td class="text-center">Sisa Pembayaran</td>
                            <td class="text-center">Status</td>
                            <td class="text-center">Aksi</td>
                            {{-- <td class="text-center">Total</td> --}}
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ route('dashboard.rincianBiaya.getRecords') }}" id="data_surat">
@push('javascript')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $.noConflict();
    $(document).ready(function () {
        $('#table_rincian_biaya').DataTable({
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
            // { data: 'dp', name: 'dp'},
            {
                data: 'dp', name: 'dp',
                render: function (data, type, full, meta) {
                    function formatRupiah(angka) {
                        var number_string = angka.toString().replace(/[^,\d]/g, ''),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        return 'Rp ' + rupiah; // Add 'Rp' prefix
                    }
                    return formatRupiah(data);
                }
            },
            {
                data: 'sisa_pembayaran', name: 'sisa_pembayaran',
                    render: function (data, type, full, meta) {
                            function formatRupiah(angka) {
                                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                                    split = number_string.split(','),
                                    sisa = split[0].length % 3,
                                    rupiah = split[0].substr(0, sisa),
                                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                return 'Rp ' + rupiah; // Add 'Rp' prefix
                            }
                            return formatRupiah(data);
                        }
            },
            {
                data: 'status', name: 'status',
                render: function (data, type, full, meta) {
                    if (data === 'DP') {
                        return '<h5 style="color: black;"><span class="badge bg-warning"><i class="fa-solid fa-clock"></i> ' + data + '</span></h5>';
                    } else if (data === 'Lunas') {
                        return '<h5 style="color: black;"><span class="badge bg-success"><i class="fa-solid fa-circle-check"></i> ' + data + '</span></h5>';
                    } else if (data === 'failed') {
                        return '<h5 style="color: black;"><span class="badge bg-danger"><i class="fa-solid fa-xmark"></i> ' + data + '</span></h5>';
                    } else {
                        return data;
                    }
                }
            },
            { data: 'options',name: 'options', orderable: false, searchable: false }
        ],
    });

    });
</script>
@endpush
@endsection
