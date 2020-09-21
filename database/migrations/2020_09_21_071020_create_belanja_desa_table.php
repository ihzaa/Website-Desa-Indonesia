<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjaDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja_desas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('total_belanja');
            $table->integer('jenis_belanja_id')
            ->unsigned();
            $table->foreign('jenis_belanja_id')
            ->references('id')
            ->on('jenis_belanjas')
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
        Schema::dropIfExists('belanja_desas');
    }
}
