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
        Schema::create('waste_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('owner_name');
            $table->string('address_kampung');
            $table->string('rt');
            $table->string('rw');
            $table->string('village')->default('Desa Sukamaju');
            $table->string('district')->default('Cilaku');
            $table->string('regency')->default('Kabupaten Cianjur');
            $table->date('weigh_date');
            $table->string('week_number')->default('Minggu 1');
            $table->decimal('organic_weight', 8, 2)->default(0);
            $table->decimal('non_organic_weight', 8, 2)->default(0);
            $table->timestamps();

            $table->index(['rw', 'rt']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_records');
    }
};
