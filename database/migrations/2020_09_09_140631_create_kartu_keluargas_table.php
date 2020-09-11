<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_kk');
            $table->string('nama_kk');
            $table->text('alamat_kk');
            $table->string('dusun_kk');
            $table->string('desa_kelurahan_kk');
            $table->integer('rt_kk');
            $table->integer('rw_kk');
            $table->text('kecamatan_kk');
            $table->string('kabupaten_kota_kk');
            $table->string('provinsi_kk');
            $table->string('kode_pos_kk');
            $table->softDeletes();
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
        Schema::dropIfExists('kartu_keluargas');
    }
}
