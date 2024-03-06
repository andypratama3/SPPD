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
        Schema::create('surat_rincian', function (Blueprint $table) {
            $table->foreignUuid('rincian_biaya_id')->references('id')->on('rincian_biayas')->onDelete('cascade');
            $table->foreignUuid('surat_id')->references('id')->on('surats')->onDelete('cascade');

            // Setting The Primary Keys
            $table->primary(['rincian_biaya_id', 'surat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_rincian');
    }
};
