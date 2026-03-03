<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('kode_mk');
            $table->string('nilai', 2)->nullable(); // A, B, C, D, E
            $table->timestamps();
            
            // Foreign key ke tabel mahasiswas
            $table->foreign('nim')
                  ->references('nim')
                  ->on('mahasiswas')
                  ->onDelete('cascade');
            
            // Foreign key ke tabel matakuliahs (menggunakan kode_mk)
            $table->foreign('kode_mk')
                  ->references('kode_mk')
                  ->on('matakuliahs')
                  ->onDelete('cascade');
            
            // Unique constraint agar tidak duplikat
            $table->unique(['nim', 'kode_mk']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};