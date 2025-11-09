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
                $table->id();
                $table->string('appointment_number')->unique();
                $table->foreignUuid('patient_id')->constrained()->onDelete('cascade');
                $table->foreignUuid('doctor_id')->constrained()->onDelete('restrict');
                $table->foreignId('schedule_id')->nullable()->constrained()->onDelete('set null');
                $table->date('appointment_date');
                $table->time('appointment_time');
                $table->integer('queue_number');
                $table->enum('status', ['scheduled', 'confirmed', 'in_progress', 'completed', 'cancelled', 'no_show'])->default('scheduled');
                $table->text('complaint')->nullable(); // keluhan
                $table->text('notes')->nullable();
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
