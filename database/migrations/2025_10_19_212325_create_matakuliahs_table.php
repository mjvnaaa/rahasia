<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama_matakuliah');
            $table->integer('sks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matakuliahs');
    }
}