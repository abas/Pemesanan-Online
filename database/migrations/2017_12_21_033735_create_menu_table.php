<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('kode_menu')->unique();
            $table->enum('jenis',['makanan','minuman','lainnya'])->default('lainnya');
            $table->string('nama_menu');
            $table->integer('harga_menu');
            $table->string('deskripsi_menu');
            $table->integer('stok_menu');
            $table->string('image_menu')->nullable();
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
        Schema::dropIfExists('menu');
    }
}
