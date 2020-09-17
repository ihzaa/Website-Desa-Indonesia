<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanPosyandusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_posyandus', function (Blueprint $table) {
            $table->id();
            $table->text('judul_kegiatan');
            $table->text('thumbnail');
            $table->longText('kegiatan');
            $table->date('tanggal_kegiatan');
            $table->unsignedBigInteger('posyandu_id');
            $table->foreign('posyandu_id')->references('id')->on('posyandus')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kegiatan_posyandus');
    }
}
