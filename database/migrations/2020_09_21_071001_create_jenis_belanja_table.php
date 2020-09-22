<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisBelanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_belanjas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jenis_belanja');
            $table->bigInteger('nominal_belanja');
            $table->integer('belanja_desa_id')->unsigned();
            $table->foreign('belanja_desa_id')
            ->references('id')
            ->on('belanja_desas')
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
        Schema::dropIfExists('jenis_belanjas');
    }
}
