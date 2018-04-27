<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acaras', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('judul');
            $table->integer('wilayah_id')->unsigned();
            $table->string('salary');
            $table->text('deskripsi');
            $table->text('foto');
            $table->text('urlfoto');
            $table->datetime('tanggal_mulai');
            $table->datetime('tanggal_berakhir');
            $table->text('alamat');
            $table->string('lat');
            $table->string('long');
            $table->string('statusAcara')->comment('1 iya 0 tidak')->default(1);
            $table->string('eventOrganizer')->comment('1 iya 0 tidak')->default(0);
            $table->string('kafe')->comment('1 iya 0 tidak')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('wilayah_id')->references('id')->on('wilayah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acaras');
    }
}
