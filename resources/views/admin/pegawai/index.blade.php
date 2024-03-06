@extends('layouts.dashboard')
@section('title', 'Karyawan')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">PEGAWAI</h4>
                    <a href="{{ route('dashboard.pegawai.create') }}" class="btn btn-primary btn-rounded mb-4 float-end text-white"><i class="fas fa-plus text-small"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center" id="table_pegawai">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIP</td>
                        <td>Action</td>
                    </tr>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $pegawai->name }}</td>
                            <td>{{ $pegawai->nip }}</td>
                            <td>
                                <a href="{{ route('dashboard.pegawai.show', $pegawai->slug) }}" class="btn btn-info btn-xs"><i class="fas fa-eye text-white"></i></a>
                                <a href="{{ route('dashboard.pegawai.edit', $pegawai->slug) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen text-white"></i></a>
                                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash text-white"></i></a>
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
