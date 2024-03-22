<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use UsesUuid,NameHasSlug;
    use HasFactory;
    protected $table = 'pegawais';

    protected $fillable = [
        'id',
        'name',
        'nip',
        'jabatan',
        'golongan',
        'slug'
    ];

    public function surat()
    {
        return $this->belongsToMany(Surat::class, 'pegawai_surats');
    }
    public function rincian()
    {
        return $this->belongsToMany(RincianBiaya::class, 'pengawai_rincian');
    }
}
