<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\RincianBiayaRequest;
// use Illuminate\Http\UploadedFile;


class RincianBiayaData extends Data
{
    public function __construct(
        public readonly array $rincian,
        public readonly array $jumlah,
        public readonly array $total,
        public readonly ?array $keterangan,
        public readonly ?string $id,

    ) {
        //
    }

    public static function fromRequest(RincianBiayaRequest $request): self
    {
        return self::from([
            $request->getRincian(),
            $request->getJumlah(),
            $request->getRp(),
            $request->getTotal(),
            $request->getKeterangan(),
            $request->getId(),
        ]);
    }

    public static function messages()
    {
        return [
            'rincian.required' => 'Kolom Rincian tidak boleh kosong!',
            'jumlah.required' => 'Kolom Jumlah tidak boleh kosong!',
            'rp.required' => 'Kolom Nominal tidak boleh kosong!',
        ];
    }
}
