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

    public static function RandomCode()
    {
        $kode_menu = Menu::pluck('kode_menu')->toArray();
        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while(in_array($pass,$kode_menu)){
            while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($chars, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
            } 
        } 
        return $pass;
    }

    public static function getName($id)
    {
        return Menu::find($id)->nama_menu;
    }

    public static function getHarga($id)
    {
        return Menu::find($id)->harga_menu;
    }
}
