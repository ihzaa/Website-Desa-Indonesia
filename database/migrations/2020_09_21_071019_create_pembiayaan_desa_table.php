<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembiayaanDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembiayaan_desas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('total_pembiayaan');
            $table->integer('jenis_pembiayaan_id')
            ->unsigned();
            $table->foreign('jenis_pembiayaan_id')
            ->references('id')
            ->on('jenis_pembiayaans')
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
        Schema::dropIfExists('pembiayaans_desas');
    }
}
