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
        Schema::create('pegawai_surats', function (Blueprint $table) {
            $table->foreignUuid('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->foreignUuid('surat_id')->references('id')->on('surats')->onDelete('cascade');

            // Setting The Primary Keys
            $table->primary(['pegawai_id', 'surat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_surats');
    }
};
