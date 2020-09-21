<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatanDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatan_desas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('total_pendapatan');
            $table->integer('jenis_pendapatan_id')
            ->unsigned();
            $table->foreign('jenis_pendapatan_id')
            ->references('id')
            ->on('jenis_pendapatans')
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
        Schema::dropIfExists('pendapatan_desas');
    }
}
