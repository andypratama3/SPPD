@extends('layouts.dashboard')
@section('title', 'Rincian Biaya')
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
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">Tambah Rincian Biaya</h5>
            </div>
            <form action="{{ route('dashboard.rincian.biaya.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor Surat</label>
                                <select name="surat" id="surat_id" class="select2 form-control">
                                    <option selected disabled>Pilih Nomor Surat</option>
                                    @foreach ($surats as $surat)
                                      <option value="{{ $surat->id }}">{{ $surat->nomor_surat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Personil <code>*</code></label>
                                <select name="pegawai" id="pegawai_id" class="select2 form-control">
                                    <option selected disabled>Pilih Personil</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="form-group">
                                <h6 class="text-center">Rincian Biaya</h6>
                                <hr>
                                <table class="table table-bordered text-center" id="dynamicAddRemove">
                                    <tr>
                                        <th class="w-25">Rincian Biaya</th>
                                        <th class="w-10">Jumlah</th>
                                        <th class="w-25">RP</th>
                                        <th class="w-25">Total</th>
                                        <th class="w-50">Keterangan</th>
                                        <th class="w-25">Actions</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="rincian[]"
                                                placeholder="Masukkan Rincian"></td>
                                        <td><input type="text" class="form-control" min="1" name="jumlah[]"></td>
                                        <td><input type="text" class="form-control" name="rp[]"
                                                placeholder="Masukkan Rp" id="rp"></td>
                                        <td><input type="text" class="form-control" name="total[]" readonly></td>
                                        <td><input type="text" class="form-control" name="keterangan[]"
                                                placeholder="Masukkan Keterangan"></td>
                                        <td><button type="button" id="dynamic-ar" class="btn btn-xs btn-primary"><i
                                                    class="fas fa-plus"></i></button></td>
                                    </tr>
                                </table>
                                <div class="mt-2 float-end" style="margin-right: 20px; border: 2px solid; padding: 10px;">
                                    <td colspan="2"><strong>Grand Total</strong></td>
                                    <td colspan="4"><strong><u>Rp. 12981267</u></strong></td>
                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jumlah DP</label>
                                <input type="text" name="dp" id="dp" class="form-control border-input">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control border-input">
                                    <option value="DP">DP</option>
                                    <option value="Belum Di Bayar">Belum Di Bayar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.rincian.biaya.index') }}" class="btn btn-danger">Kembali</a>
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

        $('#pelunasan').click(function () {
            const sisa_pembayaran = formatRupiah($('#sisa_pembayaran').val());
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
                    <input type="text" class="form-control" name="rincian[${i}]" placeholder="Masukkan rincian">
                </td>
                <td>
                    <input type="number" class="form-control" name="jumlah[${i}]" min="1">
                </td>
                <td>
                    <input type="text" class="form-control rp" name="rp[${i}]" placeholder="Masukkan Rp">
                </td>
                <td>
                    <input type="text" class="form-control" name="total[${i}]" readonly>
                </td>
                <td>
                    <input type="text" class="form-control" name="keterangan[${i}]" placeholder="Masukkan keterangan">
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
        $('#surat_id').on('change', function () {
            let surat_id = $('#surat_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("dashboard.rincian.get.pegawai") }}',
                method: 'POST',
                data: {
                    surat_id : surat_id
                },
                success: function (response) {
                    $('#pegawai_id').empty();
                    $.each(response.pegawai, function (index, pegawai) {
                        $('#pegawai_id').append('<option value="' + pegawai.id + '">' + pegawai.name + '</option>');
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

    });
</script>
@endpush
@endsection
