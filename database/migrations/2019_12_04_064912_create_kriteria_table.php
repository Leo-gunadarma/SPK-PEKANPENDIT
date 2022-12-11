<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_kriteria', 16)->nullable();
            $table->string('nama_kriteria')->nullable();
            $table->integer('bobot')->nullable();
            $table->enum('jenis', ['keuntungan', 'biaya'])->default('keuntungan');
            $table->enum('tipe_kriteria', ['integer', 'float', 'pilihan'])->default('integer');
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
        Schema::dropIfExists('kriteria');
    }
}
