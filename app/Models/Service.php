<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasSlug; // توليد الـ slug تلقائي من العنوان

    protected $fillable = [ // الحقول المسموح تعبئتها
        'title',
        'slug',
        'summary',
        'description',
        'capabilities',
        'icon',
        'meta_title',
        'meta_description',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'capabilities' => 'array', // JSON يتحول لـ array
            'is_active' => 'boolean',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') // الـ slug من العنوان
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // الرابط /services/اسم-الخدمة
    }

    public function scopeActive(Builder $query): Builder // ده اللي كان ناقص
    {
        return $query->where('is_active', true)->orderBy('sort_order'); // الظاهر بس، مرتب
    }
}
