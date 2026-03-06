<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class UpvoteDownvote extends Model
{
    use HasFactory;

    protected $table = 'upvote_downvotes';

    protected $fillable = ['is_upvote', 'post_id', 'user_id'];

    protected static ?string $resolvedTable = null;

    protected static ?bool $tableAvailable = null;

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

    public static function tableName(): string
    {
        if (self::isTableAvailable()) {
            return self::$resolvedTable;
        }

        return (new self())->table;
    }

    protected static function candidateTables(): array
    {
        return [
            'upvote_downvotes',
            'upvote_downvote',
        ];
    }
}
