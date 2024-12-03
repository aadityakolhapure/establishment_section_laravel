<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        // Create departments table
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Name of the department');
            $table->string('code', 10)->unique()->comment('Unique code for the department');
            $table->string('description')->nullable()->comment('Brief description of the department');
            $table->timestamps();
        });

        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->enum('role', ['faculty', 'admin', 'principal', 'hod'])->default('faculty');
            $table->string('degree_or_diploma');
            $table->string('employee_id')->unique();
            $table->text('address')->nullable();
            $table->string('mobile_no', 10);
            $table->string('alternative_mobile_no', 10)->nullable();
            $table->date('date_of_joining');
            $table->integer('professional_experience')->comment('Years of experience');
            $table->integer('teaching_experience')->comment('Years of teaching experience');
            $table->string('pan_number', 20)->unique();
            $table->string('aadhar_number', 12)->unique();
            $table->string('caste')->nullable();
            $table->string('subcaste')->nullable();
            $table->date('dob');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('departments');
    }
}
