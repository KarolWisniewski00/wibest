<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'type',
        'content',

        // SEO + opis
        'short_description',
        'seo_title',
        'seo_description',
        'keywords',

        'created_user_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */
    protected $casts = [
        'content' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACJE
    |--------------------------------------------------------------------------
    */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    // alias (zostawiam kompatybilność)
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERY CMS
    |--------------------------------------------------------------------------
    */

    public function hasContent(): bool
    {
        return !empty($this->content) && is_array($this->content);
    }

    public function blocks(): array
    {
        return $this->content ?? [];
    }

    public function isType(string $type): bool
    {
        return $this->type === $type;
    }

    /*
    |--------------------------------------------------------------------------
    | SEO HELPERS (NOWE)
    |--------------------------------------------------------------------------
    */

    public function seoTitle(): string
    {
        return $this->seo_title
            ?: $this->title;
    }

    public function seoDescription(): string
    {
        return $this->seo_description
            ?: $this->short_description
            ?: '';
    }

    public function seoKeywordsArray(): array
    {
        if (!$this->keywords) {
            return [];
        }

        // wspiera CSV + JSON fallback
        $decoded = json_decode($this->keywords, true);

        if (is_array($decoded)) {
            return $decoded;
        }

        return array_filter(array_map('trim', explode(',', $this->keywords)));
    }

    /*
    |--------------------------------------------------------------------------
    | SLUG AUTO GENERATION
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug) && !empty($post->title)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}