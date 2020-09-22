<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPendapatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pendapatans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jenis_pendapatan');
            $table->bigInteger('nominal_pendapatan');
            $table->integer('pendapatan_desa_id')->unsigned();
            $table->foreign('pendapatan_desa_id')
            ->references('id')
            ->on('pendapatan_desas')
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
        Schema::dropIfExists('jenis_pendapatans');
    }
}
