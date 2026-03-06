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
        $this->fixMigrationsTableIdColumn();

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

    private function fixMigrationsTableIdColumn(): void
    {
        if (!Schema::hasTable('migrations') || !Schema::hasColumn('migrations', 'id')) {
            return;
        }

        $primaryKey = DB::select("SHOW INDEX FROM `migrations` WHERE `Key_name` = 'PRIMARY'");
        if (empty($primaryKey)) {
            DB::statement('ALTER TABLE `migrations` ADD PRIMARY KEY (`id`)');
        }

        DB::statement('ALTER TABLE `migrations` MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT');

        $nextId = ((int) DB::table('migrations')->max('id')) + 1;
        DB::statement("ALTER TABLE `migrations` AUTO_INCREMENT = {$nextId}");
    }

    /**
     * Intentionally no-op to avoid dropping an existing production column.
     */
    public function down(): void
    {
    }
};
