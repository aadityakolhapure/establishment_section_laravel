<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDaysRequestedToLeavesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Adding the 'days_requested' column to the 'leaves' table
        Schema::table('leaves', function (Blueprint $table) {
            $table->integer('days_requested')->unsigned()->after('date_to')->comment('Number of days requested for leave');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the 'days_requested' column
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn('days_requested');
        });
    }
}
