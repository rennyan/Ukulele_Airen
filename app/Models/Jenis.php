<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Produk;

class Jenis extends Model
{
    protected $guarded = ['id'];
    protected $table = 'jenis';
    protected $primaryKey = 'id';

    public function produk()
    {
        return $this->hasMany(Produk::class, 'jenis_id', 'id');
    }
}
