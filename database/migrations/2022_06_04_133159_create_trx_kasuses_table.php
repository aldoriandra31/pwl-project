<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_kasuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('guru_id');
            $table->foreign('guru_id')->references('id')->on('gurus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('kasus_id');
            $table->foreign('kasus_id')->references('id')->on('kasuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal_pelanggaran');
            $table->string('gambar');
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
        Schema::dropIfExists('trx_kasuses');
    }
}
