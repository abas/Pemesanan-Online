<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;


class PencarianController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $keyword = explode(" ",$keyword);
        foreach($keyword as $key){
            $data[$key] = Menu::where('nama_menu','LIKE','%'.$key.'%')
            ->orWhere('deskripsi_menu','LIKE','%'.$key.'%')
            ->get();
        }
        // foreach($data as $key){
        //     foreach($key as $item){
        //         echo $item->nama_menu.'<br>';
        //     }
        // }
        // JSON
        return $data;
    }
}
