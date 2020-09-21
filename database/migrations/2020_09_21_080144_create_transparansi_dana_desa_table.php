<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparansiDanaDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transparansi_dana_desas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun');

            $table->integer('sisa_pendapatan_id')
            ->unsigned()->nullable();
            $table->foreign('sisa_pendapatan_id')
            ->references('id')
            ->on('sisa_pendapatan_desas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('pendapatan_desa_id')
            ->unsigned()->nullable();
            $table->foreign('pendapatan_desa_id')
            ->references('id')
            ->on('pendapatan_desas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('pembiayaan_desa_id')
            ->unsigned()->nullable();
            $table->foreign('pembiayaan_desa_id')
            ->references('id')
            ->on('pembiayaan_desas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('belanja_desa_id')
            ->unsigned()->nullable();
            $table->foreign('belanja_desa_id')
            ->references('id')
            ->on('belanja_desas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('transparansi_dana_desas');
    }
}
