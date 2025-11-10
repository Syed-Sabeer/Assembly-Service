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
        Schema::table('booking_status', function (Blueprint $table) {
            $table->string('eta')->nullable()->after('status')->comment('Estimated time of arrival');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_status', function (Blueprint $table) {
            $table->dropColumn('eta');
        });
    }
};
