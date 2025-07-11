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
        Schema::table('user_vehicle', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->timestamp('searched_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_vehicle', function (Blueprint $table) {
            $table->timestamps();
            $table->dropColumn('searched_at');
        });
    }
};
