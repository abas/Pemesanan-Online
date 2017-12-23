@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1>{{$menu->nama_menu}}</h1>
        </div>

        <div class="panel-body">
          <div class="form-horizontal" action="#">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-md-12">
                  <h4>Atas Nama : <b>{{$pesanan->nama_pemesan}}</b></h4>
                  @if($pesanan->jenis_pemesanan == 'antar')
                    <p>
                      Alamat : {{$pesanan->lokasi_pemesan}}
                    </p>
                  @endif
                <h3>
                  Rp. {{$menu->harga_menu}}<br>
                  banyak : {{$pesanan->jumlah}}<br><br>

                  total : <b>Rp. {{$menu->harga_menu*$pesanan->jumlah}}</b>
                </h3>
              </div>
              <div class="col-md-12">
                {{$menu->deskripsi_menu}}
              </div>
              <div class="col-md-12">
                <h3 class="alert alert-success">
                  Terimakasih untuk pesanannya, pesanan Anda akan segera kami proses!
                </h3>
                <a href="/" class="btn btn-info">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection