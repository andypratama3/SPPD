@extends('layouts.dashboard')
@section('title', 'Pimpinan')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">PIMPINAN</h4>
<<<<<<< Updated upstream
                    <a href="{{ route('dashboard.datamaster.pimpinan.create') }}" class="btn btn-primary btn-rounded float-end text-white"><i class="fas fa-plus text-small"></i> Tambah</a>
=======
                    <a href="{{ route('dashboard.pimpinan.create') }}" class="btn btn-primary btn-rounded float-end text-white"><i class="fas fa-plus text-small"></i> Tambah</a>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                                <a href="{{ route('dashboard.datamaster.pimpinan.edit', $pimpinan->slug) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen text-white"></i></a>
                                <a href="#" data-id="{{ $pimpinan->slug }}" class="btn btn-danger btn-xs delete"
                                    title="Hapus">
                                    <form action="{{ route('dashboard.datamaster.pimpinan.destroy', $pimpinan->slug) }}"
                                        id="delete-{{ $pimpinan->slug }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="fa fa-trash text-white"></i>

                                </a>
=======
                                {{-- <a href="{{ route('dashboard.pimpinan.show', $pimpinan->slug) }}" class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i></a> --}}
                                <a href="{{ route('dashboard.pimpinan.edit', $pimpinan->slug) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen text-white"></i></a>
                                <a href="" class="btn btn-danger btn-xs" style="color: white;"><i class="fa fa-trash"></i></a>
>>>>>>> Stashed changes
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
