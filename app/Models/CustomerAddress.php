<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'nama',
        'alamat',
        'email',
        'kota',
        'rumah',
        'provinsi',
        'kode_pos',
        'no_telp',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}