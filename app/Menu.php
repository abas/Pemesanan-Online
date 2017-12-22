<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

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

    public static function IsEmpty($id)
    {
        # code...
        if(Menu::where('user_id','=',$id)==null){
            return false;
        }
        return true;
    }
}
