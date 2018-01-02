<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayarKuliah extends Model
{
    protected $table = 'bayar_kuliah';
    protected $fillable = [
        'user_id','kode_pembayaran','jenis_pembayaran',
        'total_pembayaran','status'
    ];

    protected $hidden = ['user_id','kode_pembayaran'];

    public statis function isLunas($id)
    {
        $user = BayarKuliah::where('user_id','=',$id)->get();
        if($user->status == 'lunas'){
            return true;
        }return false;
    }
}
