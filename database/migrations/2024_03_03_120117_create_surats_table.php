<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pimpinan_id')->nullable()->references('id')->on('pimpinans')->onDelete('cascade');
            $table->string('nomor_surat');
            $table->string('tujuan_perjalanan');
            $table->enum('angkutan', ['Darat', 'Udara','Air']);
            $table->string('tempat_berangkat');
            $table->string('tempat_tujuan');
            $table->string('lama_perjalanan');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');
            $table->string('instansi');
            $table->longText('pengikut');
            $table->string('mata_anggaran');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_perjalanans');
    }
};
