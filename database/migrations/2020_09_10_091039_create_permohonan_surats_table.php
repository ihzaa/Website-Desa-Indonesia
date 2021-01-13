<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_surats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('jenis_surat');
            $table->text('attribute');
            $table->string('logo');
            $table->text('keterangan_pembuka')->nullable();
            $table->text('keterangan');
            $table->text('tipe_surat');
            $table->longText('ttd_kiri')->nullable();
            $table->longText('ttd_tengah')->nullable();
            $table->longText('ttd_kanan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_surats');
    }
}
