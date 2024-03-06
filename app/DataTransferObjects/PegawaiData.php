<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\Pegawai\PegawaiRequest;
// use Illuminate\Http\UploadedFile;


class PegawaiData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $nip,
        public readonly string $jabatan,
        public readonly string $golongan,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(PegawaiRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getNip(),
            $request->getJabatan(),
            $request->getGolongan(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'nip.required' => 'Kolom Nip tidak boleh kosong!',
        ];
    }
}
