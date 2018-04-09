@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Menu</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update_menu',$menus->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
                            <label for="no_rek" class="col-md-4 control-label">Jenis Menu</label>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="{{$menus->jenis}}">{{$menus->jenis}}</option>
                                            <option value="makanan">Makanan</option>
                                            <option value="minuman">Minuman</option>
                                            <option value="lainnya">Lainnya</option>
                                            <!-- <input id="no_rek" type="no_rek" class="form-control" name="no_rek" value="{{ old('no_rek') }}" required> -->
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input placeholder="Harga Menu Rp. " id="harga_menu" type="number" class="form-control" min="0" name="harga_menu" value="{{$menus->harga_menu}}"
                                            required>
                                    </div>
                                </div>

                                @if ($errors->has('no_rek'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_rek') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deskripsi_menu') ? ' has-error' : '' }}">
                            <label for="nama_menu" class="col-md-4 control-label">Nama Menu</label>

                            <div class="col-md-6">
                                <input placeholder="masukkan nama menu anda " id="nama_menu" type="text" class="form-control" name="nama_menu" value="{{$menus->nama_menu}}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deskripsi_menu') ? ' has-error' : '' }}">
                            <label for="deskripsi_menu" class="col-md-4 control-label">Diskripsi</label>
                            <div class="col-md-6">
                                <textarea placeholder="Masukkan Deskripsi" id="deskripsi_menu" type="text" class="form-control" name="deskripsi_menu"
                                    required>{{$menus->deskripsi_menu}}</textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stok_menu') ? ' has-error' : '' }}">
                            <label for="stok_menu" class="col-md-4 control-label">Stok Menu</label>
                            <div class="col-md-2">
                                <input placeholder="tersisa" id="stok_menu" type="number" min="0" class="form-control" name="stok_menu" value="{{$menus->stok_menu}}"
                                    required>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-info">
                                    Update
                                </button>
                            </div>
                            <div class="col-md-2">
                                <a class="btn" href="{{ route('home') }}">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection