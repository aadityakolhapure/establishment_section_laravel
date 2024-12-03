<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('leave_type_id')->constrained('leave_types')->onDelete('cascade');
            $table->text('reason')->nullable()->comment('Reason for the leave');
            $table->date('date_from')->comment('Start date of the leave');
            $table->date('date_to')->comment('End date of the leave');
            $table->enum('hod_status', ['pending', 'approved', 'rejected'])->default('pending')->comment('HOD approval status');
            $table->text('hod_remark')->nullable()->comment('HOD remarks');
            $table->enum('admin_status', ['pending', 'approved', 'rejected'])->default('pending')->comment('Admin approval status');
            $table->text('admin_remark')->nullable()->comment('Admin remarks');
            $table->enum('principal_status', ['pending', 'approved', 'rejected'])->default('pending')->comment('Principal approval status');
            $table->integer('remaining_days')->unsigned()->comment('Remaining leave days after this application');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
}
