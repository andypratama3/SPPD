@extends('layouts.dashboard')
@section('title', 'Nomor Surat')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">Nomor Surat</h4>
                </div>
                <table class="table table-responsive text-center" id="table_pimpinan">
                    <tr>
                        <td>Nomor Surat</td>
                        <td>Action</td>
                    </tr>
                    <tbody>
                        @foreach ($no_surat as $no)
                        <tr>
                            <td>{{ $no->nomor_surat }}</td>
                            <td>
                                <a href="{{ route('dashboard.datamaster.nomor_surat.edit', $no->id) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen text-white"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
