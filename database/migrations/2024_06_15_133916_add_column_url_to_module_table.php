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
        Schema::table('module', function (Blueprint $table) {
            $table->foreignId('menu_id')->default(0);
            $table->string('icon')->nullable();
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('module', function (Blueprint $table) {
            //
        });
    }
};
