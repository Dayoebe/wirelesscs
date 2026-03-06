<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create post views table for environments where it was never migrated.
     */
    public function up(): void
    {
        if (Schema::hasTable('post_views') || Schema::hasTable('post_view')) {
            return;
        }

        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 55)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('post_id');
            $table->index('user_id');
            $table->timestamps();
        });
    }

    /**
     * Intentionally no-op to avoid dropping existing production data.
     */
    public function down(): void
    {
    }
};
