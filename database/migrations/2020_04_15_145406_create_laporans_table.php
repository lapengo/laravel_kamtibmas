<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->bigIncrements('id');
            $table->string('situasi_umum');
            $table->integer('laporan_polisi');
            $table->integer('perkara_sidik');
            $table->integer('perkara_lidik');
            $table->integer('perkara_selra');
            $table->integer('perkara_sp3');
            $table->integer('perkara_henti_lidik');
            $table->integer('perkara_p21');
            $table->integer('upp_pemanggilan');
            $table->integer('upp_penangkapan');
            $table->integer('upp_penahanan');
            $table->integer('upp_penggeledahan');
            $table->integer('upp_penyitaan');
            $table->string('kejahatan_menonjol_desc');
            $table->integer('jlh_tahanan');
            $table->date('tanggal_situasi');
            $table->unsignedBigInteger('from_userid');
            $table->unsignedBigInteger('to_userid');
            $table->foreign('from_userid')->references('id')->on('users');
            $table->foreign('to_userid')->references('id')->on('users');
            
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
        Schema::dropIfExists('laporans');
    }
}
