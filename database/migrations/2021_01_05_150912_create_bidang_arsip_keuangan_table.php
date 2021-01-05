<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangArsipKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_arsip_keuangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendapatan_arsip_keuangan_id');
            $table->foreign('pendapatan_arsip_keuangan_id')
            ->references('id')
            ->on('pendapatan_arsip_keuangan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nama_bidang');
            $table->double('cash_on_hand');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang_arsip_keuangan');
    }
}
