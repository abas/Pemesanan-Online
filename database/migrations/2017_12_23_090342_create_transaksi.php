<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('menu_id');

            $table->string('nama_pemesan');
            $table->string('kontak_pemesan');
            $table->enum('jenis_pemesanan',['ambil','antar']);
            $table->string('lokasi_pemesan')->nullable();

            $table->enum('status',['terbayar','belum_terbayar'])->default('belum_terbayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
