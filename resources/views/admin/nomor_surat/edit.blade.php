@extends('layouts.dashboard')
@section('title', 'Nomor Surat')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">Nomor Surat</h5>
            </div>
            <div class="card-body">
                @include('layouts.flashmessage')
                <form action="{{ route('dashboard.datamaster.nomor_surat.update', $nomor_surat->id) }}" method="post">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group form-control-sm mx-0 px-0">
                            <label for="mata_anggaran">Nomor Surat <code>*</code></label>
                            <input type="text" class="form-control" name="nomor_surat"
                                value="{{ $nomor_surat->nomor_surat }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('dashboard.datamaster.nomor_surat.index') }}"
                            class="btn btn-danger btn-rounded text-white">Kembali</a>
                        <button class="btn btn-primary btn-rounded text-white float-end">Submit</button>
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
