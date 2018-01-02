<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Menu;
use App\User;
use Validator;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function create()
    {
        return view('tambah_menu');
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
            'jenis'         => 'required',
            'harga_menu'      => 'required',
            'nama_menu'       => 'required',
            'deskripsi_menu'       => 'required',
            'stok_menu'       => 'required'
            // 'stok_menu'       => 'required'
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect(route('tambah_menu'))
                ->withInput()
                ->withErrors($validator);
        }

        $user_id = Auth::user()->id;

        $data = new Menu();
        $data->user_id = $user_id;
        $data->kode_menu = Menu::RandomCode();
        $data->jenis = $request->jenis;
        $data->nama_menu = $request->nama_menu;
        $data->harga_menu = $request->harga_menu;
        $data->deskripsi_menu = $request->deskripsi_menu;
        $data->stok_menu = $request->stok_menu;
        // $data->save();
        if($data->save()){
            return redirect(route('home'))->with("msg","menu berhasil di tambah");
        }
        return redirect(route('home')->with("msg","gagal menambahkan menu"));
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
        $menus = Menu::find($id);
        return view('edit',compact('menus'));
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
        $rules = [
            'jenis'         => 'required',
            'harga_menu'      => 'required',
            'nama_menu'       => 'required',
            'deskripsi_menu'       => 'required',
            'stok_menu'       => 'required'
            // 'stok_menu'       => 'required'
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect(route('tambah_menu'))
                ->withInput()
                ->withErrors($validator);
        }

        $user_id = Auth::user()->id;

        $data = Menu::find($id);
        // $data->user_id = $user_id;
        // $data->kode_menu = Menu::RandomCode();
        $data->jenis = $request->jenis;
        $data->nama_menu = $request->nama_menu;
        $data->harga_menu = $request->harga_menu;
        $data->deskripsi_menu = $request->deskripsi_menu;
        $data->stok_menu = $request->stok_menu;
        // $data->save();
        if($data->update()){
            return redirect(route('home'))->with("msg","menu berhasil di edit");
        }
        return redirect(route('home')->with("msg","gagal mengedit menu"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = Menu::find($id);
        if(Auth::user()->id == $menus->user_id){
            if($menus->delete()){
                return redirect(route('home'))->with('msg','menu berhasil di hapus');
            }
        }
        return redirect(route('home'))->with('msg','menu gagal di hapus');
    }

    public function cari($keyword){
        $data = Menu::where('nama_menu', 'LIKE', '%'.$keyword.'%')->get();
        return $data;
    }
}
