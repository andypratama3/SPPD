<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RincianBiaya extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $table = 'rincian_biayas';

    protected $fillable = [
        'id',
        'rincian',
        'jumlah',
        'rp',
        'total',
        'keterangan',
    ];
}
