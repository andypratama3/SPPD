<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\SbmRequest;


class SbmData extends Data
{
    public function __construct(
        public readonly string $biaya,
        public readonly string $daerah,
        public readonly string $satuan,
        public readonly string $nilai,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(SbmRequest $request): self
    {
        return self::from([
            $request->getBiaya(),
            $request->getDaerah(),
            $request->getSatuan(),
            $request->getNilai(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'biaya.required' => 'Kolom Biaya tidak boleh kosong!',
            'daerah.required' => 'Kolom Daerah tidak boleh kosong!',
            'satuan.required' => 'Kolom Satuan tidak boleh kosong!',
            'nilai.required' => 'Kolom Nilai tidak boleh kosong!',
        ];
    }
}
