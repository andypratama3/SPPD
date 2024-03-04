@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center"> Detail Surat {{ $surat->nomor_surat }}</h5>
            </div>
            <div class="card-body">
                @include('layouts.flashmessage')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Pejabat Berwenang <code>*</code></label>
                            <input type="text" class="form-control border-input" value="{{ $surat->pimpinan->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nomor Surat <code>*</code></label>
                            <div class="input-group">
                                <input type="text" class="form-control border-input" id="nomor_surat"
                                    name="nomor_surat" value="{{ $surat->nomor_surat }}"
                                    readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text text-black">/PL21/SPPD/2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Pegawai <code>*</code></label>
                            <input type="text" class="form-control border-input" value="{{ $surat->pegawai->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tujuan Perjalanan <code>*</code></label>
                            <input type="text" class="form-control border-input" name="tujuan_perjalanan"
                                value="{{ $surat->tujuan_perjalanan }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Angkutan <code>*</code></label>
                            <input type="text" class="form-control border-input" value="{{ $surat->angkutan }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tempat Berangkat <code>*</code></label>
                            <input type="text" class="form-control border-input" name="tempat_berangkat"
                            readonly value="{{ $surat->tempat_berangkat }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tempat Tujuan <code>*</code></label>
                            <input type="text" class="form-control border-input" name="tempat_tujuan"
                                value="{{ $surat->tempat_tujuan }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Lama Perjalanan <code>*</code></label>
                            <div class="input-group">
                                <input type="number" min="1" max="100" class="form-control border-input" name="lama_perjalanan"
                                    value="{{ $surat->lama_perjalanan }}" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text text-black">Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Kembali <code>*</code></label>
                            <input type="date" class="form-control border-input" name="tanggal_kembali"
                                placeholder="Masukan Tujuan" value="{{ $surat->tanggal_kembali }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Instansi</label>
                            <input type="text" class="form-control border-input" name="instansi" readonly
                                value="{{ $surat->instansi }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mata Anggaran <code>*</code></label>
                            <input type="text" class="form-control border-input" value="{{ $surat->mata_anggaran }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6 class="text-center">Pengikut</h6>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th class="w-25">Nama</th>
                                    <th class="w-25">Umur</th>
                                    <th class="w-50">Hubungan</th>
                                </tr>
                                @php
                                $pengikutDetails = explode(',', $surat->pengikut);
                                @endphp

                                @foreach ($pengikutDetails as $detail)
                                    @php
                                    $parts = explode(' - ', $detail);
                                    $nama_umur = explode(' ', $parts[0]);
                                    $nama = $nama_umur[0];
                                    // Extracting umur within parentheses
                                    preg_match('/\(([^)]+)\)/', $parts[0], $matches);
                                    $umur = $matches[1];
                                    $hubungan = $parts[1] ?? '';
                                    @endphp
                                    <tr>
                                        <td><input type="text" class="form-control" name="nama[]"
                                                readonly value="{{ $nama }}"></td>
                                        <td><input type="text" class="form-control" name="umur[]"
                                            readonly value="{{ $umur }}"></td>
                                        <td><input type="text" class="form-control" name="hubungan[]"
                                            readonly value="{{ $hubungan }}"></td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
            <div class="card-body mt-3">

                <div class="row">
                    <div class="col-md-12" >
                        <hr>
                        <div class="form-group"> <input type="hidden">
                            <h6 class="text-center">Rincian Biaya</h6>
                            <hr>
                            <table class="table table-bordered text-center" id="dynamicAddRemove">
                                <tr>
                                    <th class="w-25">Rincian Biaya</th>
                                    <th class="w-25">RP</th>
                                    <th class="w-25">Jumlah</th>
                                    <th class="w-50">Keterangan</th>
                                </tr>
                                <td><input type="text" class="form-control" name="rincian[]"
                                    placeholder="Masukkan Rincian"></td>
                                <td><input type="text" class="form-control" name="rp[]"
                                    placeholder="Masukkan Rp"></td>
                                <td><input type="text" class="form-control" name="jumlah[]"
                                        placeholder="Masukkan jumlah"></td>
                                <td><input type="text" class="form-control" name="keterangan[]"
                                        placeholder="Masukkan Keterangan"></td>
                                <th class="w-25"><button type="button" id="dynamic-ar"
                                        class="btn btn-xs btn-primary"><i class="fas fa-plus"></i></button></th>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Jumlah DP</label>
                            <input type="text" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="" id="" class="form-control border-input">
                                <option value="">DP</option>
                                <option value="">Belum Di Bayar</option>
                                <option value="">Lunas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger">Kembali</a>
                        <button class="btn btn-primary float-end">Submit</button>
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
                        <input type="text" class="form-control" name="rincian[` + i + `]" placeholder="Masukkan rincian">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="rp[` + i + `]" placeholder="Masukkan Rp">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="jumlah[` + i + `]" placeholder="Masukkan jumlah">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="keterangan[` + i + `]" placeholder="Masukkan keterangan">
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

    });
</script>
@endpush
@endsection
