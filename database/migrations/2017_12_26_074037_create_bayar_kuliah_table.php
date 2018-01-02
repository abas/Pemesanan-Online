<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayarKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_kuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('kode_pembayaran')->unique();
            $table->enum('jenis_pembayaran',['sks','spp','modul','poliklinik']);
            $table->integer('total_pembayaran');
            $table->enum('status',['lunas','belum_terbayar']);
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
        Schema::dropIfExists('bayar_kuliah');
    }
}
