<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrsTable extends Migration
{
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
            $table->foreignId('matakuliah_id')->constrained('matakuliahs')->onDelete('cascade');
            $table->string('semester'); // contoh: Ganjil / Genap
            $table->timestamps();
            $table->unique(['mahasiswa_id','matakuliah_id','semester'], 'krs_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('krs');
    }
}