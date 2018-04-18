<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pesan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',100);
            $table->integer('acara_id')->unsigned();
            $table->integer('pengirim_id')->unsigned();
            $table->integer('penerima_id')->unsigned();
            $table->text('pesan');
            $table->text('lampiran')->nullable();
            $table->text('url_lampiran')->nullable();
            $table->timestamps();
            $table->foreign('acara_id')->references('id')->on('acaras');
            $table->foreign('pengirim_id')->references('id')->on('users');
            $table->foreign('penerima_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
