<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SbmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function getBiaya()
    {
        $this->biaya;
    }
    public function getDaerah()
    {
        $this->daerah;
    }
    public function getSatuan()
    {
        $this->satuan;
    }
    public function getNilai()
    {
        $this->nilai;
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
