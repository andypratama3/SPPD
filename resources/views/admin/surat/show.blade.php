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
                                <input type="text" class="form-control form-control-sm border-input mb-1" name="tujuan_perjalanan"
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
                        <div class="form-group mt-5">
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
                        <a href="{{ route('dashboard.surat.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                    </div>
                </div>
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
