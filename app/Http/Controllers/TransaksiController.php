<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Transaksi;
use Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $menu = Menu::find($id);
        return view('detail_menu',compact('menu'))->with("msg","pesan ambil akan kadaluarsa dalam 20 menit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_pemesan'         => 'required',
            'kontak_pemesan'      => 'required',
            'jenis_pemesanan'       => 'required',
        ];

        if($request->jenis_pemesanan === "antar"){
            $rules['lokasi_pemesan'] = 'required';
        }
        
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect(route('pemesanan',$request->menu_id))
            ->withInput()
            ->withErrors($validator);
        }

        $menu = Menu::find($request->menu_id);
        $data = new Transaksi();
        $data->user_id = $menu->user_id;    
        $data->menu_id = $request->menu_id;
        $data->nama_pemesan = $request->nama_pemesan;
        $data->kontak_pemesan = $request->kontak_pemesan;
        $data->jenis_pemesanan = $request->jenis_pemesanan;
        if($request->jenis_pemesanan === "antar"){
            $data->lokasi_pemesan = $request->lokasi_pemesan;
        }
        if($data->save()){
            $menu->stok_menu = $menu->stok_menu -1;
            $menu->update();
            return $data;
            // return redirect(route('detail_pesanan'))->with('msg','pesanan success');
        }
        return redirect()->back()->with('msg','pesanan gagal');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
