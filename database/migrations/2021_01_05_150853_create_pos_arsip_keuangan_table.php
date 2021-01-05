<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosArsipKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_arsip_keuangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_arsip_keuangan_id');
            $table->foreign('tahun_arsip_keuangan_id')
            ->references('id')
            ->on('tahun_arsip_keuangan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nama_pos');
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
        Schema::dropIfExists('pos_arsip_keuangan');
    }
}
