@extends('layouts.dashboard')
@section('title', 'User')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h4 class="text-center">User</h4>
                    {{-- <a href="{{ route('dashboard.datamaster.pegawai.create') }}" class="btn btn-primary btn-rounded mb-4 float-end text-white"><i class="fas fa-plus text-small"></i> Tambah</a> --}}
                </div>
                <table class="table table-responsive text-center">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Aksi</td>
                    </tr>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == '1' ? 'Admin' : 'User')
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.datamaster.user.edit', $user->slug) }}" class="btn btn-warning btn-xs"><i class="fas fa-pen text-white"></i></a>
                                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash text-white"></i></a>
                                </td>
                            </tr>   
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>
    $(document).ready(function () {

    });
</script>
@endpush
@endsection
