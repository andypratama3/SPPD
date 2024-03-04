<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pimpinan extends Model
{
    use HasFactory;
    use UsesUuid,NameHasSlug;

    protected $table = 'pimpinans';

    protected $fillable = [
        'name',
        'nip',
        'jabatan',
    ];
}
