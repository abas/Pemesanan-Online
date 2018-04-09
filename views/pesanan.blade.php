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
            <h2>List Pesanan</h2>
            <!-- <a href="#" class="btn btn-warning">add Makanan</a> -->
            <a href="{{route('tambah_menu')}}" class="btn btn-success">Tambah Menu</a>
            <a href="{{route('home')}}" class="btn btn-warning">My Menu</a>
            <br><br>
            <div class="row">
                @if($pesanan->count()>0 && $isNothing->count()>0)
                    @foreach($pesanan as $psn)
                    @if($psn->done != 'true')
                    <div class="col-md-4">

                        <div class="panel panel-default">
                            <a href="{{route('pemesanan_selesai',$psn->id)}}" style="margin-left: 92%;" class="btn btn-danger btn-sm"><b>X</b></a>
                            <div class="panel-heading">
                              <h4>{{$menu->getName($psn->menu_id)}} <b>[{{$psn->jenis_pemesanan}}]</b><br>
                                Harga : Rp. {{$menu->getHarga($psn->menu_id)}}
                              </h4>
                              
                            </div>
                            <div class="panel-body">
                              Pemesan : <b>{{$psn->nama_pemesan}}</b><br>
                              Jumlah : <b>{{$psn->jumlah}}</b><br>
                              Kontak : <b>{{$psn->kontak_pemesan}}</b><br>
                              Total : <b style="font-size:25px;">Rp. {{$menu->getHarga($psn->menu_id) * $psn->jumlah}}</b>
                              <br><br>
                              @if($psn->jenis_pemesanan == 'antar')
                                @if($psn->status == 'belum_terbayar')
                                  <p class="alert alert-danger">Belum Terbayar</p>
                                @else
                                  <p class="alert alert-success">Terbayar</p>
                                @endif
                              @endif
                            </div>
                            <div class="panel-footer">
                                @if($psn->jenis_pemesanan == 'ambil')
                                  <button class="btn btn-info" onclick="notif()"><b>Beritahu Pemesan!</b></button>
                                  <script>
                                    function notif(){
                                      alert('Pesan Telah Terkirim ke {{$psn->nama_pemesan}}')
                                    }
                                  </script><br>
                                  <b>*beritahu pemesan jika pesanan sudah jadi</b>
                                @else
                                  <form action="">
                                    <button class="btn btn-info"><b>Verifikasi Pembayaran</b></button>
                                  </form>
                                @endif
                            </div>
                        </div>

                    </div>
                    @endif
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p class="alert alert-danger" style="width:100%">Tidak Ada Pesanan!</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
</div>

@endsection