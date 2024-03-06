<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\SuratRequest;
// use Illuminate\Http\UploadedFile;


class SuratData extends Data
{
    public function __construct(
        public readonly string $pimpinan_id,
        public readonly string $nomor_surat,
        public readonly array $pegawai,
        public readonly string $tujuan_perjalanan,
        public readonly string $angkutan,
        public readonly string $tempat_berangkat,
        public readonly string $tempat_tujuan,
        public readonly string $lama_perjalanan,
        public readonly string $tanggal_berangkat,
        public readonly string $tanggal_kembali,
        public readonly string $instansi,
        public readonly ?string $pengikut,
        public readonly array $nama,
        public readonly array $umur,
        public readonly array $hubungan,
        public readonly string $mata_anggaran,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(SuratRequest $request): self
    {
        return self::from([
            $request->getPemimpin(),
            $request->getNomorSurat(),
            $request->getPegawai(),
            $request->getTujuanPerjalanan(),
            $request->getAngkutan(),
            $request->getTempatBerangkat(),
            $request->getTempatTujuan(),
            $request->getLamaPerjalanan(),
            $request->getTanggalKembali(),
            $request->getTanggalJalan(),
            $request->getInstansi(),
            $request->getMataAnggaran(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'nomor_surat.required' => 'Kolom Nomor Surat tidak boleh kosong!',
            'tujuan_perjalanan.required' => 'Kolom Tujuan Perjalanan tidak boleh kosong!',
            'angkutan.required' => 'Kolom Angkutan Harus Di Pilih tidak boleh kosong!',
            'tempat_berangkat.required' => 'Kolom Tempat Berangkat tidak boleh kosong!',
            'tempat_tujuan.required' => 'Kolom Tempat Tujuan tidak boleh kosong!',
            'lama_perjalanan.required' => 'Kolom Lama Perjalanan tidak boleh kosong!',
            'tanggal_kembali.required' => 'Kolom Tanggal Kembali tidak boleh kosong!',
            'instansi.required' => 'Kolom Instansi tidak boleh kosong!',
            'tanggal_berangkat.required' => 'Kolom Tanggal Berangkat tidak boleh kosong!',
            'mata_anggaran.required' => 'Kolom Mata Anggaran tidak boleh kosong!',
        ];
    }
}
