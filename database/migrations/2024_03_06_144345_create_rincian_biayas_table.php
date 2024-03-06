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
        Schema::create('rincian_biayas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('rincian');
            $table->string('jumlah');
            $table->string('rp');
            $table->string('total');
            $table->string('keterangan')->nullable();
            $table->float('dp')->nullable();
            $table->float('sisa_pembayaran', 8,3)->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rincian_biayas');
    }
};
