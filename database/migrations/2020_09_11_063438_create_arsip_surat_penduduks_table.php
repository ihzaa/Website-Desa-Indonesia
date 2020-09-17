<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipSuratPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_surat_penduduks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('nomer');
            $table->dateTime('tanggal_surat');
            $table->unsignedBigInteger('penduduk_id');
            $table->unsignedBigInteger('permohonan_surat_id');
            $table->foreign('penduduk_id')->references('id')->on('penduduks')->onDelete('cascade');
            $table->foreign('permohonan_surat_id')->references('id')->on('permohonan_surats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_surat_penduduks');
    }
}
