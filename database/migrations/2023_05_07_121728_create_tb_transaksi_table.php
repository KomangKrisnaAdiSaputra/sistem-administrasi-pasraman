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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('tb_user');
            $table->text('kode_transaksi');
            $table->string('nama_pelanggan', 100);
            $table->string('no_telepon', 100);
            $table->string('email', 100)->nullable();
            $table->enum('kategori', ['Privat', 'Umum'])->default('Privat');
            $table->string('sapta_wara', 100);
            $table->string('panca_wara', 100);
            $table->string('wuku', 100);
            $table->date('tanggal_upacara');
            $table->time('waktu_upacara');
            $table->integer('status');
            $table->date('tanggal_transaksi');
            $table->integer('biaya');
            $table->integer('dp');
            $table->integer('pelunasan')->nullable();
            $table->date('tanggal_pelunasan')->nullable();
            $table->text('keterangan_upacara')->nullable();
            $table->text('keterangan_cancel')->nullable();
            $table->date('tanggal_banten_pulang')->nullable();
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
        Schema::dropIfExists('tb_transaksi');
    }
};
