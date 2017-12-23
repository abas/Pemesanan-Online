@extends('layouts.app') @section('content')

<div class="container">
    <div class="row">
        @if (session('status'))
        <div class="col-md-12">

            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <h2>Semua Menu</h2>
            <!-- <a href="#" class="btn btn-warning">add Makanan</a> -->
            <a href="{{route('tambah_menu')}}" class="btn btn-success">Tambah Menu</a>
            <a href="#" class="btn btn-warning">Pesanan</a>
            <br><br>
            <div class="row">
                @if($menus->count()>0)
                    @foreach($menus as $menu)
                    <div class="col-md-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>{{$menu->nama_menu}}</h4>
                                by: <b>{{$user->getName($menu->user_id)}}</b>
                            </div>
                            <div class="panel-body">
                                {{$menu->deskripsi_menu}}
                            </div>
                            <div class="panel-footer">
                                <p style="text-align: right">
                                    <b>[{{$menu->jenis}}]</b>
                                </p>
                                <a href="{{route('delete_menu',$menu->id)}}" class="btn btn-danger">Hapus</a>
                                <a href="{{route('edit_menu',$menu->id)}}" class="btn btn-info">Edit</a>
                                Stok : <b>{{$menu->stok_menu}}</b>
                            </div>
                        </div>

                    </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p class="alert alert-danger" style="width:100%">Menu Kosong!</p    >
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
</div>

@endsection