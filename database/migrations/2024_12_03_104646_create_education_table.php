<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('ssc_marks', 5, 2);
            $table->string('ssc_school_name');
            $table->string('ssc_board');
            $table->year('ssc_passout_year');
            $table->decimal('hsc_marks', 5, 2)->nullable();
            $table->string('hsc_school_name')->nullable();
            $table->string('hsc_board')->nullable();
            $table->year('hsc_passout_year')->nullable();
            $table->decimal('diploma_marks', 5, 2)->nullable();
            $table->string('diploma_school_name')->nullable();
            $table->string('diploma_board')->nullable();
            $table->year('diploma_passout_year')->nullable();
            $table->decimal('ug_marks', 5, 2)->nullable();
            $table->string('ug_college_name')->nullable();
            $table->string('ug_university')->nullable();
            $table->string('ug_degree_name')->nullable();
            $table->year('ug_passing_year')->nullable();
            $table->decimal('pg_marks', 5, 2)->nullable();
            $table->string('pg_college_name')->nullable();
            $table->string('pg_university')->nullable();
            $table->string('pg_degree_name')->nullable();
            $table->year('pg_passing_year')->nullable();
            $table->string('phd_specialization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
}
