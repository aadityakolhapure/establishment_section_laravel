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
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade'); // Nullable foreign key
            $table->enum('role', ['faculty', 'admin', 'principal', 'hod'])->default('faculty'); // Default role
            $table->string('degree_or_diploma')->nullable();
            $table->string('employee_id')->unique()->nullable(); // Nullable and unique
            $table->text('address')->nullable();
            $table->string('mobile_no', 10)->nullable(); // Limited to 10 characters
            $table->string('alternative_mobile_no', 10)->nullable();
            $table->date('date_of_joining')->nullable();
            $table->integer('professional_experience')->nullable()->comment('Years of experience');
            $table->integer('teaching_experience')->nullable()->comment('Years of teaching experience');
            $table->string('pan_number', 20)->unique()->nullable(); // Made nullable for flexibility
            $table->string('aadhar_number', 12)->unique()->nullable(); // Made nullable
            $table->string('caste')->nullable();
            $table->string('subcaste')->nullable();
            $table->date('dob')->nullable(); // Date of birth
            $table->timestamps(); // Created at and updated at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}
