<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Warna;
use App\Models\Produk;

class Detail extends Model
{
    protected $guarded = ['id'];
    protected $table = 'details';
    protected $primaryKey = 'id';

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class,'produk_id','id');
    }
}
