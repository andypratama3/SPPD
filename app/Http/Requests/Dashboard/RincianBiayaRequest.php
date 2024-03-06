<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RincianBiayaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getRincian()
    {
        $this->rincian;
    }
    public function getJumlah()
    {
        $this->jumlah;
    }
    public function getRp()
    {
        $this->rp;
    }
    public function getTotal()
    {
        $this->total;
    }
    public function getKeterangan()
    {
        $this->keterangan;
    }

    public function getDp()
    {
        $this->dp;
    }
    public function getSiswaPembayaran()
    {
        $this->sisa_pembayaran;
    }
    public function getStatus()
    {
        $this->status;
    }
    public function getId()
    {
        $this->id;
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
