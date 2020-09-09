<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->text('tempat_lahir');
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->boolean('jenis_kelamin')->comment('0 perempuan, 1 laki-laki');
            $table->string('gol_darah');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('status_kawin');
            $table->string('kewarganegaraan');
            $table->string('status_hidup');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_passpor')->nullable();
            $table->string('no_kitas')->nullable();
            $table->enum('shdrt', ['kepala keluarga', 'istri', 'anak'])->comment('status hidup dalam rumah tangga');
            $table->unsignedBigInteger('id_kartu_keluarga');
            $table->unsignedBigInteger('id_data_ktp')->nullable();
            $table->unsignedBigInteger('id_kematian')->nullable();
            $table->foreign('id_kartu_keluarga')->references('id')->on('kartu_keluargas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_data_ktp')->references('id')->on('kartu_keluargas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kematian')->references('id')->on('kartu_keluargas')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('penduduks');
    }
}
