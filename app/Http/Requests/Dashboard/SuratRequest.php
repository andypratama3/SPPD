<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function getPemimpin()
    {
        $this->pimpinan_id;
    }
    public function getPegawai()
    {
        $this->pegawai_id;
    }
    public function getNomorSurat()
    {
        $this->nomor_surat;
    }
    public function getTujuanPerjalanan()
    {
        $this->tujuan_perjalanan;
    }
    public function getAngkutan()
    {
        $this->angkutan;
    }
    public function getTempatBerangkat()
    {
        $this->tempat_berangkat;
    }
    public function getTempatTujuan()
    {
        $this->tempat_tujuan;
    }
    public function getLamaPerjalanan()
    {
        $this->lama_perjalanan;
    }
    public function getTanggalKembali()
    {
        $this->tanggal_kembali;
    }
    public function getInstansi()
    {
        $this->instansi;
    }
    //pengikut
    public function getMataAnggaran()
    {
        $this->mata_anggaran;
    }
    public function getSlug()
    {
        $this->slug;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
