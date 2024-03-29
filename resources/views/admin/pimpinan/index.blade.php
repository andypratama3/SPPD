@extends('layouts.dashboard')
@section('title', 'Pimpinan')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">PIMPINAN</h4>
                    <a href="{{ route('dashboard.datamaster.pimpinan.create') }}" class="btn btn-primary btn-rounded float-end text-white"><i class="fas fa-plus text-small"></i> Tambah</a>
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
                                <a href="{{ route('dashboard.datamaster.pimpinan.edit', $pimpinan->slug) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen text-white"></i></a>

                                <a href="#" data-id="{{ $pimpinan->slug }}" class="btn btn-danger btn-xs delete" style="color: white;">
                                    <form action="{{ route('dashboard.datamaster.pimpinan.destroy', $pimpinan->slug) }}"
                                        id="delete-{{ $pimpinan->slug }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                    </form>
                                <i class="fa fa-trash"></i></a>
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
