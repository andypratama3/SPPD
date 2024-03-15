@extends('layouts.dashboard')
@section('title', 'Edit Surat')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">Edit Surat</h5>
            </div>
            <div class="card-body">
                @include('layouts.flashmessage')
                <form action="{{ route('dashboard.surat.update', $surat->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" id="slug" value="{{ $surat->slug }}">

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Pejabat Berwenang <code>*</code></label>
                                <select name="pimpinan_id" id="" class="form-control select2">
                                    <option selected value="{{ $surat->pimpinan->id }}">{{ $surat->pimpinan->name }}</option>
                                    @foreach ($pimpinans as $pimpinan)
                                    <option value="{{ $pimpinan->id }}">{{ $pimpinan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Surat <code>*</code></label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-input" id="nomor_surat"
                                        name="nomor_surat" value="{{ $surat->nomor_surat }}"
                                        placeholder="Masukan Hanya Awalan No Surat">
                                        @foreach ($nomor_surat as $no)
                                            <span class="input-group-text text-black">{{ $no->nomor_surat }}</span>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Pegawai <code>*</code></label>
                                <select name="pegawai[]" multiple class="form-control select2" data-placeholder="Pilih Pegawai" id="pegawai" style="width: 100%">
                                    @foreach ($surat->pegawai as $pegawai)
                                    <option selected value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                                    @endforeach
                                    @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Tujuan Perjalanan <code>*</code></label>
                                <input type="text" class="form-control border-input" name="tujuan_perjalanan"
                                    placeholder="Masukan Tujuan Perjalanan" value="{{ $surat->tujuan_perjalanan }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Angkutan <code>*</code></label>
                                <select name="angkutan" class="form-control" style="border-radius: 10px;">
                                    <option selected {{ $surat->angkutan }}>{{ $surat->angkutan }}</option>
                                    <option value="Darat">Darat</option>
                                    <option value="Udara">Udara</option>
                                    <option value="Laut">Laut</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Berangkat <code>*</code></label>
                                <input type="text" class="form-control border-input" name="tempat_berangkat"
                                    placeholder="Masukan Tempat Berangkat" readonly value="{{ $surat->tempat_berangkat }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Tujuan <code>*</code></label>
                                <input type="text" class="form-control border-input" name="tempat_tujuan"
                                    placeholder="Masukan Tempat Berangkat" value="{{ $surat->tempat_tujuan }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Lama Perjalanan <code>*</code></label>
                                <div class="input-group">
                                    <input type="number" min="1" max="100" class="form-control border-input" name="lama_perjalanan"
                                        placeholder="Masukan Angka" value="{{ $surat->lama_perjalanan }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-black">Hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group">
                                <label for="tanggak_kembali">Tanggal Berangkat <code>*</code></label>
                                <input type="date" class="form-control form-control-sm" name="tanggal_berangkat" id="tanggal_berangkat"
                                    placeholder="Masukan Tujuan" value="{{ $surat->tanggal_berangkat }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Kembali <code>*</code></label>
                                <input type="date" class="form-control border-input" name="tanggal_kembali"
                                    placeholder="Masukan Tujuan" value="{{ $surat->tanggal_kembali }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Instansi</label>
                                <input type="text" class="form-control border-input" name="instansi" readonly
                                    value="Politeknik Pertanian Negeri Samarinda">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Mata Anggaran <code>*</code></label>
                                <select name="mata_anggaran" id="" style="border-radius: 10px;" class="form-control">
                                    <option selected value="{{ $surat->mata_anggaran }}">{{ $surat->mata_anggaran }}</option>
                                    <option value="524111">524111</option>
                                    <option value="524113">524113</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="form-group form-control-sm mx-0 px-0">
                                <label for="sbm_id">Sbm <code>*</code></label>
                                <select name="sbm_id" id="sbm_id" class="form-control form-control-sm ">
                                    <option selected value="{{ $surat->sbm_id }}">{{ $surat->sbm->biaya }}</option>
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
                                        <th class="w-25">Action</th>
                                    </tr>
                                    @php
                                        $decodedNama = json_decode($surat->nama, true);
                                        $decodedUmur = json_decode($surat->umur, true);
                                        $decodedHubungan = json_decode($surat->hubungan, true);
                                    @endphp
                                    @foreach ($decodedNama as $index => $nama)
                                    <tr>
                                        <td><input type="text" class="form-control" name="nama[]" value="{{ $nama }}"></td>
                                        <td><input type="text" class="form-control" name="umur[]" value="{{ $decodedUmur[$index] }}"></td>
                                        <td><input type="text" class="form-control" name="hubungan[]" value="{{ $decodedHubungan[$index] }}"></td>
                                        <td><button type="button" class="btn btn-xs btn-danger remove-row delete-item-array" data-id="{{ $index }}"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                    @endforeach
                                    <th class="w-25"><button type="button" id="dynamic-ar"
                                        class="btn btn-xs btn-primary"><i class="fas fa-plus"></i></button></th>
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
                        <input type="text" class="form-control" name="nama[` + i + `]" placeholder="Masukkan Nama">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="umur[` + i + `]" placeholder="Masukkan umur">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="hubungan[` + i + `]" placeholder="Masukkan Hubungan">
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
        //delete data in array rincian
        $('#dynamicAddRemove').on('click', '.delete-item-array', function () {
            let item_array_index = $(this).data("id");
            let slug = $('#slug').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('dashboard.surat.arrayDelete') }}",
                data: {
                    item_array_index : item_array_index,
                    slug : slug,
                },
                cache: false,
                success: function (response) {
                    console.log(response.success);
                }
            });

        });
    });
</script>
@endpush
@endsection
