<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail;

class Warna extends Model
{
    protected $guarded = ['id'];
    protected $table = 'warnas';
    protected $primaryKey = 'id';

    public function detail1()
    {
        return $this->hasMany(Detail::class, 'warna_id', 'id');
    }
}
