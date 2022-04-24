<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Models\Jenis;
use App\Models\Detail;

class Produk extends Model
{
    protected $guarded = ['id'];
    protected $table = 'produks';
    protected $primaryKey = 'id';

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function detail()
    {
        return $this->hasMany(Detail::class,'produk_id','id');
    }
}
