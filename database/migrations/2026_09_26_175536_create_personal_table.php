<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users');
            $table->date('born_date');
            $table->char('gender', 1);
            $table->string('phone', 25)->unique();
            $table->string('address');
            $table->string('pass_id', 50)->unique();
            $table->date('hire_date');
            $table->date('fire_date')->nullable();
            $table->index('hire_date');
        });

        DB::statement('ALTER TABLE personal ADD CONSTRAINT check_personal_hire_fire_date CHECK (fire_date > hire_date)');
        DB::statement("ALTER TABLE personal ADD CONSTRAINT check_personal_gender CHECK (gender IN ('m', 'f'))");
        DB::statement('ALTER TABLE personal ADD CONSTRAINT check_personal_born_date CHECK (EXTRACT(year FROM age(CURRENT_DATE, born_date)) >= 18)');
    }

    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};