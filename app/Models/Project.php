<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model implements HasMedia
{
    use HasSlug, InteractsWithMedia; // slug + رفع الصور

    protected $fillable = [
        'sector_id',
        'title',
        'slug',
        'client',
        'location',
        'latitude',
        'longitude',
        'summary',
        'challenge',
        'role',
        'technical_delivery',
        'outcome',
        'highlights',
        'status',
        'completed_year',
        'meta_title',
        'meta_description',
        'is_featured',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'status' => ProjectStatus::class,
            'technical_delivery' => 'array', // JSON يتحول لـ array
            'highlights' => 'array',
            'latitude' => 'float',
            'longitude' => 'float',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile(); // صورة الغلاف
        $this->addMediaCollection('gallery');             // معرض الصور
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb') // نسخة مصغّرة للكروت
            ->width(800)->height(600)
            ->performOnCollections('cover', 'gallery')
            ->nonQueued();
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
