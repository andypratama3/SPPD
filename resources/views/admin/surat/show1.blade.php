@extends('layouts.dashboard')
@section('title', 'Surat')
@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            {{-- FORM DETAIL --}}
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center"> Detail Surat {{ $surat->nomor_surat }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Pejabat Berwenang <code>*</code></label>
                            <input type="text" class="form-control form-control-sm border-input" value="{{ $surat->pimpinan->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Nomor Surat <code>*</code></label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm border-input" id="nomor_surat"
                                    name="nomor_surat" value="{{ $surat->nomor_surat }}"
                                    readonly>
                                    @foreach ($nomor_surat as $no)
                                        <span class="input-group-text text-black">{{ $no->nomor_surat }}</span>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Pegawai <code>*</code></label>
                                @foreach ($surat->pegawai as $pegawai)
                                <input type="text" class="form-control form-control-sm border-input" name="tujuan_perjalanan"
                                value="{{ $pegawai->name }}" style="width: 100%" readonly>
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Tujuan Perjalanan <code>*</code></label>
                            <input type="text" class="form-control form-control-sm border-input" name="tujuan_perjalanan"
                                value="{{ $surat->tujuan_perjalanan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Angkutan <code>*</code></label>
                            <input type="text" class="form-control form-control-sm border-input" value="{{ $surat->angkutan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Tempat Berangkat <code>*</code></label>
                            <input type="text" class="form-control form-control-sm border-input" name="tempat_berangkat"
                            readonly value="{{ $surat->tempat_berangkat }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Tempat Tujuan <code>*</code></label>
                            <input type="text" class="form-control form-control-sm border-input" name="tempat_tujuan"
                                value="{{ $surat->tempat_tujuan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Lama Perjalanan <code>*</code></label>
                            <div class="input-group">
                                <input type="number" min="1" max="100" class="form-control form-control-sm border-input" name="lama_perjalanan"
                                    value="{{ $surat->lama_perjalanan }}" readonly>
                                    <span class="input-group-text text-black">Hari</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Berangkat <code>*</code></label>
                            <input type="date" class="form-control form-control-sm border-input" name="tanggal_berangkat"
                                placeholder="Masukan Tujuan" value="{{ $surat->tanggal_berangkat }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Kembali <code>*</code></label>
                            <input type="date" class="form-control form-control-sm border-input" name="tanggal_kembali"
                                placeholder="Masukan Tujuan" value="{{ $surat->tanggal_kembali }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Instansi</label>
                            <input type="text" class="form-control form-control-sm border-input" name="instansi" readonly
                                value="{{ $surat->instansi }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Mata Anggaran <code>*</code></label>
                            <input type="text" class="form-control form-control-sm border-input" value="{{ $surat->mata_anggaran }}" readonly>
                        </div>
                    </div>

                    {{-- FORM PENGIKUT --}}
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <h5 class="text-center">Pengikut</h5>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th class="w-25">Nama</th>
                                    <th class="w-25">Umur</th>
                                    <th class="w-50">Hubungan</th>
                                </tr>
                                @if(!empty($surat->nama) && (!empty($surat->umur)) && (!empty($surat->hubungan)))
                                @php
                                    $decodedNama = json_decode($surat->nama, true);
                                    $decodedUmur = json_decode($surat->umur, true);
                                    $decodedHubungan = json_decode($surat->hubungan, true);
                                @endphp
                                @foreach ($decodedNama as $index => $nama)
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="nama[]" readonly value="{{ $nama }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="umur[]" readonly value="{{ $decodedUmur[$index] }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="hubungan[]" readonly value="{{ $decodedHubungan[$index] }}"></td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="nama[]"
                                        readonly></td>
                                <td><input type="text" class="form-control form-control-sm" name="umur[]"
                                    readonly ></td>
                                <td><input type="text" class="form-control form-control-sm" name="hubungan[]"
                                    readonly></td>
                            </tr>
                            @endif
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>


            <div class="card-body mt-3" id="card-not-refresh">
                @include('layouts.flashmessage')
                {{-- RINCIAN BIAYA KOSONGAN --}}
                @if($surat->rincianBiaya->isEmpty())
                <form action="{{ route('dashboard.rincian.biaya.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="surat" value="{{ $surat->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5 class="text-center">Rincian Biaya</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dynamicAddRemove">
                                        <tr>
                                            <th class="w-25">Rincian Biaya</th>
                                            <th class="w-10">Jumlah</th>
                                            <th class="w-25">RP</th>
                                            <th class="w-25">Total</th>
                                            <th class="w-50">Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <td><input type="text" class="form-control form-control-sm" name="rincian[]"
                                            placeholder="Masukkan Rincian"></td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" name="jumlah[]" class="form-control form-control-sm"></td>
                                        <td><input type="text" class="form-control form-control-sm" name="rp[]"
                                            placeholder="Masukkan Rp" id="rp"></td>
                                        <td><input type="text" class="form-control form-control-sm" name="total[]"
                                            readonly></td>
                                        <td><input type="text" class="form-control form-control-sm" name="keterangan[]"
                                                placeholder="Masukkan Keterangan"></td>
                                        <th><button type="button" id="dynamic-ar"
                                                class="btn btn-xs btn-primary"><i class="fas fa-plus text-white"></i></button></th>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah DP</label>
                                <input type="text" name="dp" id="dp" class="form-control form-control-sm border-input" placeholder="Masukkan DP">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control form-control-sm border-input">
                                    <option selected disabled>Pilih Status Pembayaran</option>
                                    <option value="DP">DP</option>
                                    <option value="Belum Di Bayar">Belum Di Bayar</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button class="btn btn-primary btn-rounded float-end text-white">Submit</button>
                        </div>
                    </div>
                </form>

                {{-- RINCIAN BIAYA ISIAN --}}
                @else
                @foreach ($surat->rincianBiaya as $rincian)
                <form action="{{ route('dashboard.rincian.biaya.update', $rincian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="rincian_id" value="{{ $rincian->id }}">
                    <input type="hidden" name="surat" value="{{ $surat->id }}">
                    <div class="row" id="not-refresh">
                        <div class="col-md-12" id="form-group-reload">
                            <div class="form-group mt-3">
                                <h5 class="text-center">Rincian Biaya</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dynamicAddRemove">
                                        <tr>
                                            <th class="w-25">Rincian Biaya</th>
                                            <th class="w-10">Jumlah</th>
                                            <th class="w-25">RP</th>
                                            <th class="w-25">Total</th>
                                            <th class="w-50">Keterangan</th>
                                            @if($rincian->status == 'Lunas')
                                            @else
                                            <th class="w-25">Hapus</th>
                                            @endif
                                        </tr>
                                        @foreach ($surat->rincianBiaya as $rincian)
                                        @php
                                            $decodedRincian = json_decode($rincian['rincian'], true);
                                            $decodedJumlah = json_decode($rincian['jumlah'], true);
                                            $decodedRp = json_decode($rincian['rp'], true);
                                            $decodedTotal = json_decode($rincian['total'], true);
                                            $decodedKeterangan = json_decode($rincian['keterangan'], true);
                                        @endphp
                                        @foreach ($decodedRincian as $key => $item_rincian)
                                            <tr id="refresh-data">
                                                <td><input type="text" class="form-control form-control-sm" name="rincian[]" placeholder="Masukkan Rincian" value="{{ $item_rincian }}"></td>
                                                <td><input type="number" class="form-control form-control-sm" min="1" name="jumlah[]" value="{{ $decodedJumlah[$key] }}"></td>
                                                <td><input type="number"  class="form-control form-control-sm" name="rp[]" placeholder="Masukkan Rp" value="{{ $decodedRp[$key] }}" id="rp"></td>
                                                <td><input type="text" class="form-control form-control-sm" name="total[]" readonly value="{{ $decodedTotal[$key] }}"></td>
                                                <td><input type="text" class="form-control form-control-sm" name="keterangan[]" placeholder="Masukkan Keterangan" value="{{ $decodedKeterangan[$key] }}"></td>
                                                @if($rincian->status == 'Lunas')
                                                @else
                                                <td><button type="button" class="btn btn-xs btn-danger remove-row delete-item-array" data-id="{{ $key }}"><i class="fa fa-trash text-white"></i></button></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        @endforeach
                                        <tr>
                                            @if($rincian->status == 'Lunas')
                                            @else
                                            <td colspan="6"><button type="button" id="dynamic-ar" class="btn btn-xs btn-primary px-4"><i class="fas fa-plus text-white"></i></button></td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                @if($rincian->status == 'Lunas')
                                <label for="">Pembayaran Full</label>
                                <input type="text" id="dp" class="form-control form-control-sm border-input" readonly value="{{ $rincian->dp }}">
                                @else
                                <label for="">Jumlah DP</label>
                                @foreach ($surat->rincianBiaya as $dp)
                                <input type="text" name="dp" id="dp" class="form-control form-control-sm border-input" readonly value="{{ $dp->dp }}">
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                @if($rincian->status == 'Lunas')
                                <input type="text" name="dp" id="dp" class="form-control form-control-sm border-input" readonly value="{{ $rincian->status }}">
                                @else
                                <select name="status" class="form-control form-control-sm border-input">
                                    @foreach ($surat->rincianBiaya as $status)
                                    <option selected value="{{ $status->status }}">{{ $status->status }}</option>
                                    @endforeach
                                    <option value="DP">DP</option>
                                    <option value="Belum Di Bayar">Belum Di Bayar</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group" id="sisa_pembayaran_reload">
                                <label for="">Sisa Pembayaran</label>
                                <input type="text" class="form-control form-control-sm border-input" readonly id="sisa_pembayaran" value="{{ $rincian->sisa_pembayaran }}">
                            </div>
                        </div>
                        @if($rincian->status == 'Lunas')
                        <div class="col-12">
                            <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                        </div>
                        @else
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Input Pelunasan</label>
                                <input type="text" class="form-control form-control-sm border-input" name="pelunasan" id="pelunasan" placeholder="Masukkan Pelunasan">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button class="btn btn-primary btn-rounded float-end text-white">Simpan</button>
                        </div>
                        @endif
                    </div>
                </form>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@push('javascript')
<script>
    $(document).ready(function () {
        $('.select2').select2();

        $('#pelunasan').click(function () {
        const sisa_pembayaran = formatRupiah($('#sisa_pembayaran').val());
        $('#sisa_pembayaran').val(sisa_pembayaran);
        });

        $('#dp').click(function () {
         const dp = formatRupiah($('#dp').val());
         $('#dp').val(dp);
        });

        $('#pelunasan').click(function () {
            const pelunasan = formatRupiah($('#pelunasan').val());
            $('#pelunasan').val(pelunasan);
        });

        let i = 5;
        $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(
            `<tr>
                <td>
                    <input type="text" class="form-control form-control-sm" name="rincian[${i}]" placeholder="Masukkan rincian">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" name="jumlah[${i}]" min="1">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm rp" name="rp[${i}]" placeholder="Masukkan Rp">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="total[${i}]" readonly>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="keterangan[${i}]" placeholder="Masukkan keterangan">
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
    $('#dp').on('input', function () {
        let dp = $('#dp').val();
            dp = dp.replace(/[^0-9.]/g, '');
            dp = formatRupiah(dp);
            $(this).val(dp);
    });
    $('#pelunasan').on('input', function () {
        let pelunasan = $('#pelunasan').val();
            pelunasan = pelunasan.replace(/[^0-9.]/g, '');
            pelunasan = formatRupiah(pelunasan);
            $(this).val(pelunasan);
    });
    $('#dynamicAddRemove').on('input', 'input[name^="rp"], input[name^="jumlah"]', function () {
        let tr = $(this).closest('tr');
        let rp = tr.find('input[name^="rp"]').val();
        let jumlah = tr.find('input[name^="jumlah"]').val();
        let total = calculateTotal(rp, jumlah);
        tr.find('input[name^="total"]').val(total);
    });

    function calculateTotal(rp, jumlah) {
        rp = rp.replace(/[^0-9.]/g, '');
        jumlah = jumlah.replace(/[^0-9.]/g, '');
        rp = parseFloat(rp);
        jumlah = parseFloat(jumlah);
        let total = rp * jumlah;
        total = formatRupiah(total);
        return total;
    }

    // Fungsi untuk memformat angka sebagai mata uang Rupiah
    function formatRupiah(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }
    $('#card-not-refresh').on('click', '.delete-item-array', function () {
        let item_array_index = $(this).data("id");
        let rincian_id = $('#rincian_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('dashboard.rincianBiaya.arrayDelete') }}",
            data: {
                item_array_index : item_array_index,
                rincian_id : rincian_id,
            },
            cache: false,
            success: function (response) {
                $('#refresh-data').load(location.href + " #refresh-data");
                $('#sisa_pembayaran_reload').load(location.href + " #sisa_pembayaran_reload");

            }
        });
    });

});
</script>
@endpush
@endsection
