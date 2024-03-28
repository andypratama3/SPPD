@extends('layouts.dashboard')
@section('title', 'EDIT USER')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">EDIT USER</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.user.update', $user->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{ $user->slug }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" readonly value="{{ $user->name }}">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" readonly value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Role <code>*</code></label>
                                <select name="role" id="" class="form-control">
                                    @if($user->role == '1' ? 'Admin' : 'User')
                                    <option selected value="{{ $user->role }}">Admin</option>
                                    @else
                                    <option selected value="{{ $user->role }}">User</option>
                                    @endif
                                    <option disabled>Pilih Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.datamaster.pimpinan.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button class="btn btn-primary btn-rounded float-end text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>

</script>
@endpush
@endsection
