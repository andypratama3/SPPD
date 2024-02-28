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
        'name',
        'nip',
        'slug'
    ];
}
