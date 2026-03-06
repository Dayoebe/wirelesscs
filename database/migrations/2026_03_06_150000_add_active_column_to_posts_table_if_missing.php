<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add posts.active for legacy/imported databases that missed it.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('posts', 'active')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->boolean('active')->default(true)->after('body');
            });

            if (Schema::hasColumn('posts', 'status')) {
                DB::table('posts')->update([
                    'active' => DB::raw("CASE WHEN status = 'approved' THEN 1 ELSE 0 END"),
                ]);
            }
        }
    }

    /**
     * Intentionally no-op to avoid dropping an existing production column.
     */
    public function down(): void
    {
    }
};
