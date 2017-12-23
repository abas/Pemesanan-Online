@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{$menu->nama_menu}}</h1></div>

                <div class="panel-body">
                    <form class="form-horizontal" action="#">
                        {{ csrf_field() }}

                        <div class="form-group">
                          <div class="col-md-12">
                              <h3>Rp. {{$menu->harga_menu}}</h3>
                          </div>
                          <div class="col-md-12">
                            {{$menu->deskripsi_menu}}
                          </div>
                          <div class="col-md-12">
                            tersisa : {{$menu->stok_menu}}
                          </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="{{ route('simpan_transaksi') }}">
                        {{ csrf_field() }}
                        <input type="number" name="menu_id" style="display: none;" value="{{$menu->id}}">
                        <div class="form-group{{ $errors->has('jenis_pemesanan') ? ' has-error' : '' }}">
                          <div class="col-md-6">
                            <label for="jenis_pemesanan">Metode*</label>
                            <select name="jenis_pemesanan" id="jenis_pemesanan" class="form-control">
                              <option value="">pilih jenis pemesanan</option>
                              <option value="antar">Antar</option>
                              <option value="ambil">Ambil</option>
                            </select>
                            @if ($errors->has('jenis_pemesanan'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('jenis_pemesanan') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label for="jumlah">Jumlah Pesanan*</label>
                            <input type="number" min="0" name="jumlah" id="jumlah" placeholder="Jumlah Pesanan" class="form-control" require>
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_pemesan') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <label for="nama_pemesan">Nama*</label>
                            <input type="text" name="nama_pemesan" id="nama_pemesan" placeholder="Nama Pemesa" class="form-control">
                            @if ($errors->has('nama_pemesan'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nama_pemesan') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('kontak_pemesan') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <label for="kontak_pemesan">Kontak*</label>
                            <input type="text" name="kontak_pemesan" id="kontak_pemesan" placeholder="Telegram, IG, LINE, Whats App" class="form-control">
                            @if ($errors->has('kontak_pemesan'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kontak_pemesan') }}</strong>
                              </span>
                            @endif  
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('lokasi_pemesan') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <label for="lokasi_pemesan">Lokasi</label>
                            <input type="text" name="lokasi_pemesan" id="lokasi_pemesan" placeholder="Kosongi jika anda memilih Pesanan Ambil" class="form-control">
                            @if ($errors->has('lokasi_pemesan'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('lokasi_pemesan') }}</strong>
                              </span>
                            @endif    
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-2">
                                <button type="submit" class="btn btn-success">Pesan</button>
                              </div>
                              <div class="col-md-2">
                                <a href="/" class="btn btn-danger">Cancel</a>  
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection