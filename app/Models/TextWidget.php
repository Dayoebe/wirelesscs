<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class TextWidget extends Model
{
    use HasFactory;

    protected $table = 'text_widgets';

    protected $fillable = [
        'key',
        'image',
        'title',
        'content',
        'active'
    ];

    protected static ?string $resolvedTable = null;

    protected static ?bool $tableAvailable = null;

    public static function getTitle(string $key): string
    {
        $widget = self::findActiveByKey($key);

        if (!$widget) {
            return '';
        }

        return $widget->title;
    }

    public static function getContent(string $key): string
    {
        $widget = Cache::get('text-widget-' . $key, function () use ($key) {
            return self::findActiveByKey($key);
        });

        if (!$widget) {
            return '';
        }

        return $widget->content;
    }

    public static function findActiveByKey(string $key): ?self
    {
        if (!self::isTableAvailable()) {
            return null;
        }

        $query = self::query()->where('key', $key);

        if (self::hasColumn('active')) {
            $query->where('active', 1);
        }

        return $query->first();
    }

    public function getTable()
    {
        if (self::isTableAvailable()) {
            return self::$resolvedTable;
        }

        return $this->table;
    }

    public static function isTableAvailable(): bool
    {
        if (self::$tableAvailable !== null) {
            return self::$tableAvailable;
        }

        try {
            foreach (self::candidateTables() as $table) {
                if (Schema::hasTable($table)) {
                    self::$resolvedTable = $table;
                    self::$tableAvailable = true;

                    return true;
                }
            }
        } catch (\Throwable $e) {
            // Ignore DB/schema inspection failures and mark unavailable.
        }

        self::$resolvedTable = null;
        self::$tableAvailable = false;

        return false;
    }

    protected static function hasColumn(string $column): bool
    {
        if (!self::isTableAvailable()) {
            return false;
        }

        try {
            return Schema::hasColumn(self::$resolvedTable, $column);
        } catch (\Throwable $e) {
            return false;
        }
    }

    protected static function candidateTables(): array
    {
        return [
            'text_widgets',
            'text_widget',
        ];
    }
}
