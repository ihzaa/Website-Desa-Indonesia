<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPembiayaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pembiayaans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jenis_pembiayaan');
            $table->bigInteger('nominal_pembiayaan');
            $table->integer('pembiayaan_desa_id')->unsigned();
            $table->foreign('pembiayaan_desa_id')
            ->references('id')
            ->on('pembiayaan_desas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('jenis_pembiayaans');
    }
}
