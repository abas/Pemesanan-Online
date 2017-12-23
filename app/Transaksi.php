<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id','menu_id','status',
        'nama_pemesan','kontak_pemesan','lokasi_pemesan',
        'jenis_pemesanan'
    ];
    protected $hidden = [
        'menu_id','user_id'
    ];
}
