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
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Hubungkan ke doctors (juga UUID)
            $table->foreignUuid('doctor_id')->constrained('doctors')->onDelete('cascade');

            $table->string('day'); // contoh: Monday, Tuesday, dst
            $table->time('start_time');
            $table->time('end_time');

            // kuota pasien per jadwal
            $table->integer('quota')->default(1);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
