<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianArsipKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_arsip_keuangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bidang_arsip_keuangan_id');
            $table->unsignedBigInteger('pos_arsip_keuangan_id');
            $table->foreign('bidang_arsip_keuangan_id')
            ->references('id')
            ->on('bidang_arsip_keuangan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('pos_arsip_keuangan_id')
            ->references('id')
            ->on('pos_arsip_keuangan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('rincian');
            $table->double('nominal');
            $table->double('pajak');
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
        Schema::dropIfExists('rincian_arsip_keuangan');
    }
}
