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
        Schema::create('appointments', function (Blueprint $table) {
            // Primary key UUID
            $table->uuid('id')->primary();

            // Foreign keys (semuanya UUID, sesuaikan dengan tabel lain)
            $table->foreignUuid('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignUuid('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->foreignUuid('schedule_id')->constrained('schedules')->onDelete('cascade');

            // Informasi appointment
            $table->string('appointment_number')->unique();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->integer('queue_number')->nullable();

            // Status: scheduled, in_progress, completed, canceled
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'canceled'])->default('scheduled');

            // Keterangan tambahan
            $table->text('complaint')->nullable();
            $table->text('notes')->nullable();

            // Waktu check-in dan selesai
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
