<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create text_widgets for legacy databases where it is missing.
     */
    public function up(): void
    {
        if (Schema::hasTable('text_widgets') || Schema::hasTable('text_widget')) {
            return;
        }

        Schema::create('text_widgets', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('image', 2048)->nullable();
            $table->string('title', 2048);
            $table->longText('content')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Keep production content safe by not dropping this table automatically.
    }
};
