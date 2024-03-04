@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">Tambah Surat</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.pegawai.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Surat <code>*</code></label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-input" id="nomor_surat" name="nomor_surat"
                                        value="{{ old('nomor_surat') }}" placeholder="Masukan Hanya Awalan No Surat">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-black">/PL21/SPPD/2024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pegawai <code>*</code></label>
                                <select name="pegawai_id" multiple id="pegawai_id" class="form-control select2" data-placeholder="Pilih Pegawai | Bisa Multiple" style="border-radius: 10px !important;">
                                    <option value="">Pilih Pegawai</option>
                                    @foreach ($pegawais as $pegawai)
                                        <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tujuan Perjalanan <code>*</code></label>
                                <input type="text" class="form-control border-input" name="tujuan_perjalanan"
                                    placeholder="Masukan Tujuan Perjalanan" value="{{ old('tujuan_perjalanan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Angkutan <code>*</code></label>
                                    <select name="angkutan" class="form-control" style="border-radius: 10px;">
                                        <option selected disabled>Pilih Angkutan</option>
                                        <option value="Darat">Darat</option>
                                        <option value="Udara">Udara</option>
                                        <option value="Laut">Laut</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Berangkat <code>*</code></label>
                                <input type="text" class="form-control border-input" name="tempat_berangkat"
                                    placeholder="Masukan Tempat Berangkat" value="{{ old('tempat_berangkat') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Tujuan <code>*</code></label>
                                <input type="text" class="form-control border-input" name="tempat_tujuan"
                                    placeholder="Masukan Tempat Berangkat" value="{{ old('tempat_tujuan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Lama Perjalanan <code>*</code></label>
                                <input type="text" class="form-control border-input" name=""
                                    placeholder="Masukan Tujuan" value="{{ old('') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Kembali <code>*</code></label>
                                <input type="date" class="form-control border-input" name="tempat_tujuan"
                                    placeholder="Masukan Tujuan" value="{{ old('tempat_tujuan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Instansi</label>
                                <input type="text" class="form-control border-input" readonly value="Politeknik Negeri Pertanian Samarinda">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Mata Anggaran <code>*</code></label>
                                <select name="" id="" style="border-radius: 10px;" class="form-control">
                                    <option selected disabled>Pilih Mata Anggaran</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <label for="">Pengikut</label> --}}
                                <table class="table table-bordered text-center" id="dynamicAddRemove">
                                    <tr>
                                        <th class="w-75">Pengikut</th>
                                    </tr>
                                    <td><input type="text" class="form-control" name="pengikut[]" placeholder="Masukkan Nama"></td>
                                    <th class="w-25"><button type="button" id="dynamic-ar" class="btn btn-xs btn-primary"><i class="fas fa-plus"></i></button></th>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            <button class="btn btn-primary btn-sm float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script>
    $(document).ready(function () {
        $('.select2').select2();
        let i = 5;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(
                `<tr>
                    <td>
                        <input type="text" class="form-control" name="pengikut[` + i + `]" placeholder="Masukkan Nama">
                    </td>
                    <td colspan="2">
                        <button type="button" class="btn btn-xs btn-danger remove-input-field"><i class="fas fa-trash"></i></button></td>
                    </td>
                </tr>`
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
            --i;
        });
        $('#nomor_surat').on('change', function () {
            let nomor_surat = $('#nomor_surat').val();
            // $.ajax({
            //     type: "POST",

            //     data: {
            //         nomor_surat : nomor_surat,
            //     },
            //     cache: false,
            //     success: function (response) {

            //     }
            // });
        });
    });
</script>
@endpush
@endsection
