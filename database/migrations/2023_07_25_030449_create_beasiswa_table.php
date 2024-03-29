<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id('id_beasiswa');
            $table->string('nama');
            $table->string('nim');
            $table->string('email');
            $table->string('nomor_hp');
            $table->tinyInteger('semester');
            $table->float('ipk', 3, 2);
            $table->string('beasiswa');
            $table->text('berkas');
            $table->string('status_ajuan');
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
        Schema::dropIfExists('beasiswa');
    }
}
