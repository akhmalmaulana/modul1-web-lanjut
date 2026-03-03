<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->string('kode_mk', 10)->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->integer('semester'); // PASTIKAN INI ADA
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matakuliahs');
    }
};