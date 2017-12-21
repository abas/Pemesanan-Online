<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'user_id','kode_menu','nama_menu',
        'deskripsi_menu','stok_menu','image_menu'
    ];

    protected $hidden = [
        'user_id','kode_menu'
    ];
}
