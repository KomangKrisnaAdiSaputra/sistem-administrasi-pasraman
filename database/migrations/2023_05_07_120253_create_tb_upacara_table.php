<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_upacara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_upacara');
            $table->foreign('id_jenis_upacara')->references('id')->on('tb_jenis_upacara');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('tb_user');
            $table->string('nama_upacara', 100);
            $table->integer('status');
            $table->string('status_vendor', 100);
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
        Schema::dropIfExists('tb_upacara');
    }
};
