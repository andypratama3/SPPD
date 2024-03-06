@extends('layouts.dashboard')
@section('title, Rincian Biaya')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group" >
                    <h3 class="text-center">Surat</h3>
                    <a href="{{ route('dashboard.surat.create') }}" class="btn btn-primary btn-rounded btn-right-add mb-4 mx-0 text-white"><i class="fas fa-plus text-small text-white"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center w-100" id="table_surat">
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
@endsection
