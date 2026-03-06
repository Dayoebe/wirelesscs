<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class Post extends Model
{
    use HasFactory;

    protected static array $columnExistsCache = [];

    protected $fillable = ['title', 'slug', 'thumbnail', 'body', 'user_id', 'active', 'published_at', 'meta_title', 'meta_description'];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function shortBody($words = 30): string
    {
        return Str::words(strip_tags($this->body), $words);
    }

    public function getFormattedDate()
    {
        return $this->published_at->format('F jS Y');
    }

    public function getThumbnail()
    {
        return '/storage/app/public/' . $this->thumbnail;
    }

    public function humanReadTime(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                $words = Str::wordCount(strip_tags($attributes['body']));
                $minutes = ceil($words / 200);

                return $minutes . ' ' . str('min')->plural($minutes) . ', '
                    . $words . ' ' . str('word')->plural($words);
            }
        );
    }

    public function scopeVisible(Builder $query): Builder
    {
        $table = $query->getModel()->getTable();

        if (self::hasColumn('active')) {
            return $query->where("{$table}.active", 1);
        }

        if (self::hasColumn('status')) {
            return $query->where("{$table}.status", 'approved');
        }

        return $query;
    }

    public function scopePublished(Builder $query): Builder
    {
        $table = $query->getModel()->getTable();

        return $query->whereDate("{$table}.published_at", '<=', now());
    }

    public function isVisible(): bool
    {
        if (self::hasColumn('active')) {
            return (bool) $this->active;
        }

        if (self::hasColumn('status')) {
            return $this->status === 'approved';
        }

        return true;
    }

    public function upvoteDownvotes()
    {
        return $this->hasMany(UpvoteDownvote::class, 'post_id');
    }

    public function views(): HasMany
    {
        return $this->hasMany(PostView::class, 'post_id');
    }

    protected static function hasColumn(string $column): bool
    {
        if (array_key_exists($column, self::$columnExistsCache)) {
            return self::$columnExistsCache[$column];
        }

        try {
            self::$columnExistsCache[$column] = Schema::hasColumn((new self())->getTable(), $column);
        } catch (\Throwable $e) {
            self::$columnExistsCache[$column] = false;
        }

        return self::$columnExistsCache[$column];
    }

}
