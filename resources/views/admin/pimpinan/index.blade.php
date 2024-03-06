@extends('layouts.dashboard')
@section('title', 'Pimpinan')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">Pimpinan</h4>
                    <a href="{{ route('dashboard.pimpinan.create') }}" class="btn btn-primary btn-rounded btn-fw mb-4" style="float: inline-end; margin-right: 14px; color: white; padding: 12px;"><i class="fas fa-plus" style="font-size: 12px"></i> Tambah</a>
                </div>
                <table class="table table-responsive text-center" id="table_pimpinan">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIP</td>
                        <td>Jabatan</td>
                        <td>Action</td>
                    </tr>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($pimpinans as $pimpinan)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $pimpinan->name }}</td>
                            <td>{{ $pimpinan->nip }}</td>
                            <td>{{ $pimpinan->jabatan }}</td>
                            <td>
                                {{-- <a href="{{ route('dashboard.pimpinan.show', $pimpinan->slug) }}" class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i></a> --}}
                                <a href="{{ route('dashboard.pimpinan.edit', $pimpinan->slug) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-danger btn-xs" style="color: white;"><i class="fas fa-trash"></i></a>
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
