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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('promosi_id')->nullable()->constrained('promosis')->nullOnDelete();
            $table->enum('metode_pengantaran', ['diambil','diantar']);
            $table->longText('detail_pengantaran')->nullable();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('potongan_harga', 12, 2)->default(0);
            $table->decimal('total_harga', 12, 2);
            $table->enum('status', ['menunggu','diproses', 'selesai', 'dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
