@extends('layouts.dashboard')
@section('title', 'Surat')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">TAMBAH SURAT</h5>
            </div>
            <div class="card-body">
                @include('layouts.flashmessage')
                <form action="{{ route('dashboard.surat.store') }}" method="post">
                    @csrf
                    <div class="row text-md">
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="pimpinan">Pejabat Berwenang <code>*</code></label>
                                <select name="pimpinan_id" id="pimpinan" class="form-control select2" style="width: 100%;">
                                    <option selected disabled>Pilih Pejabat Berwenang</option>
                                    @foreach ($pimpinans as $pimpinan)
                                    <option value="{{ $pimpinan->id }}">{{ $pimpinan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat <code>*</code></label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="nomor_surat"
                                        name="nomor_surat" value="{{ old('nomor_surat') }}"
                                        placeholder="Masukan Hanya Awalan No Surat">
                                            @foreach ($nomor_surat as $no)
                                                <span class="input-group-text text-black">{{ $no->nomor_surat }}</span>
                                            @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="pegawai">Pegawai <code>*</code></label>
                                <select name="pegawai[]" multiple class="form-control select2" data-placeholder="Pilih Pegawai" id="pegawai" style="width: 100%">
                                    <option disabled>Pilih Pegawai</option>
                                    @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="tujuan_perjalanan">Tujuan Perjalanan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm" name="tujuan_perjalanan" id="tujuan_perjalanan"
                                    placeholder="Masukan Tujuan Perjalanan" value="{{ old('tujuan_perjalanan') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="angkutan">Angkutan <code>*</code></label>
                                <select name="angkutan" id="angkutan" class="form-control form-control-sm">
                                    <option selected disabled>Pilih Angkutan</option>
                                    <option value="Darat">Darat</option>
                                    <option value="Udara">Udara</option>
                                    <option value="Laut">Laut</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="tempat_berangkat">Tempat Berangkat <code>*</code></label>
                                <input type="text" class="form-control form-control-sm" name="tempat_berangkat" id="tempat_berangkat"
                                    placeholder="Masukan Tempat Berangkat" readonly value="Samarinda">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="tempat_tujuan">Tempat Tujuan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm" name="tempat_tujuan" id="tempat_tujuan"
                                    placeholder="Masukan Tempat Tujuan" value="{{ old('tempat_tujuan') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="detail_tempat_tujuan">Detail Tempat Tujuan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm" name="detail_tempat_tujuan" id="detail_tempat_tujuan"
                                    placeholder="Masukan Secara Detail Tempat" value="{{ old('detail_tempat_tujuan') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="lama_perjalanan">Lama Perjalanan <code>*</code></label>
                                <div class="input-group">
                                    <input type="number" min="1" max="100" class="form-control form-control-sm" name="lama_perjalanan" id="lama_perjalanan"
                                        placeholder="Masukan Angka" value="{{ old('lama_perjalanan') }}">
                                        <span class="input-group-text text-black">Hari</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="tanggak_kembali">Tanggal Berangkat <code>*</code></label>
                                <input type="date" class="form-control form-control-sm" name="tanggal_berangkat" id="tanggal_berangkat"
                                    placeholder="Masukan Tujuan" value="{{ old('tanggal_berangkat') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="tanggak_kembali">Tanggal Kembali <code>*</code></label>
                                <input type="date" class="form-control form-control-sm" name="tanggal_kembali" id="tanggal_kembali"
                                    placeholder="Masukan Tujuan" value="{{ old('tanggal_kembali') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="instansi">Instansi</label>
                                <input type="text" class="form-control form-control-sm" name="instansi" id="instansi" readonly
                                    value="Politeknik Pertanian Negeri Samarinda">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group form-control-sm mx-0 px-0">
                                <label for="mata_anggaran">Mata Anggaran <code>*</code></label>
                                <select name="mata_anggaran" id="mata_anggaran" class="form-control form-control-sm ">
                                    <option selected disabled>Pilih Mata Anggaran</option>
                                    <option value="524111">524111</option>
                                    <option value="524113">524113</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group form-control-sm mx-0 px-0">
                                <label for="sbm_id">Sbm <code>*</code></label>
                                <select name="sbm_id" id="sbm_id" class="form-control form-control-sm ">
                                    <option selected disabled>Pilih SBM</option>
                                    @foreach ($sbms as $sbm)
                                        <option value="{{ $sbm->id }}">{{ $sbm->biaya }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="text-center">Pengikut</h6>
                                <table class="table table-bordered text-center" id="dynamicAddRemove">
                                    <tr>
                                        <th class="w-25">Nama</th>
                                        <th class="w-25">Umur</th>
                                        <th class="w-50">Hubungan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <td><input type="text" class="form-control" name="nama[]"
                                            placeholder="Masukkan Nama"></td>
                                    <td><input type="text" class="form-control" name="umur[]"
                                            placeholder="Masukkan Umur"></td>
                                    <td><input type="text" class="form-control" name="hubungan[]"
                                            placeholder="Masukkan Hubungan"></td>
                                    <th class="w-25"><button type="button" id="dynamic-ar"
                                            class="btn btn-xs btn-primary"><i class="fas fa-plus text-white text-small"></i></button></th>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button class="btn btn-primary btn-rounded text-white float-end">Submit</button>
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
                        <input type="text" class="form-control form-control-sm" name="nama[` + i + `]" placeholder="Masukkan Nama">
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="umur[` + i + `]" placeholder="Masukkan umur">
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="hubungan[` + i + `]" placeholder="Masukkan Hubungan">
                    </td>
                    <td colspan="2">
                        <button type="button" class="btn btn-xs btn-danger remove-input-field"><i class="fa fa-trash text-white"></i></button></td>
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
