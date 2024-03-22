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
        Schema::create('pegawai_rincian', function (Blueprint $table) {
            $table->foreignUuid('rincian_biaya_id')->references('id')->on('rincian_biayas')->onDelete('cascade');
            $table->foreignUuid('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');

            // Setting The Primary Keys
            $table->primary(['rincian_biaya_id', 'pegawai_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_rincian');
    }
};
