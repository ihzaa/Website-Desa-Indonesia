<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_arsip_dokumen_id');
            $table->foreign('tahun_arsip_dokumen_id')
            ->references('id')
            ->on('tahun_arsip_dokumen')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nama_arsip');
            $table->string('file');
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
        Schema::dropIfExists('arsip_dokumen');
    }
}
