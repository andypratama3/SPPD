<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sbm extends Model
{

    use UsesUuid;
    use HasFactory;
    protected $table = 'sbms';

    protected $fillable = [
        'biaya',
        'satuan',
        'daerah',
        'nilai',
        'slug'
    ];
    public function setBiayaAttribute($value)
    {
        $this->attributes['biaya'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function surat()
    {
        return $this->hasMany(Surat::class, 'sbm_id', 'id');
    }
}
