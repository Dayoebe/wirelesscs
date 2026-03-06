<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create vote table for environments where it was never migrated.
     */
    public function up(): void
    {
        if (Schema::hasTable('upvote_downvotes') || Schema::hasTable('upvote_downvote')) {
            return;
        }

        Schema::create('upvote_downvotes', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_upvote');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->index('post_id');
            $table->index('user_id');
            $table->index(['post_id', 'user_id']);
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
