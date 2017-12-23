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
                @if($pesanan->jenis_pemesanan == 'ambil')
                  <h3 class="alert alert-success">
                    Terimakasih untuk pesanannya, pesanan Anda akan segera kami proses!
                  </h3>
                  @else
                    <h3 class="alert alert-success">
                      Silahkan lakukan pembayaran pada Nomor Rekening berikut
                    </h3>
                    <p>
                      <h4>
                        Atas Nama Rekening: <b>{{$user->name}}</b><br>
                        Nomor Rekening: <b>{{$user->no_rek}}</b><br>
                        Rekening : <b>{{$user->name_rek}}</b>
                      </h4>
                    </p>
                @endif
                <br>
                <a href="/" class="btn btn-info">Back</a>
              </div>
            </div>
          </div>
        </div>
        @if($pesanan->jenis_pemesanan == 'ambil')
        <div class="panel-footer">
          Note: <br>
          <b>Pesanan akan Hangus bila tidak di ambil dalam kurun waktu 5 menit setelah pemberitahuan dari Admin</b>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection