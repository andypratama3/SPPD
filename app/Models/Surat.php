<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surat extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $table = 'surats';

    protected $fillable = [
        'pimpinan_id',
        'nomor_surat',
        'pegawai_id',
        'tujuan_perjalanan',
        'angkutan',
        'tempat_berangkat',
        'tempat_tujuan',
        'lama_perjalanan',
        'tanggal_kembali',
        'instansi',
        'pengikut',
        'mata_anggaran',
        'slug',
    ];
    public function setNomorSuratAttribute($value)
    {
        $this->attributes['nomor_surat'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class, 'pimpinan_id', 'id');
    }
    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class, 'pegawai_surats');
    }
}
