<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value']; // الحقول المسموح تعبئتها

    protected static function booted(): void
    {
        // أي تعديل أو حذف يمسح الكاش عشان القيمة الجديدة تظهر فوراً
        static::saved(fn() => Cache::forget('settings.all'));
        static::deleted(fn() => Cache::forget('settings.all'));
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        // كل الإعدادات في query واحد ومتخزنة في الكاش
        $all = Cache::rememberForever(
            'settings.all',
            fn() => static::query()->pluck('value', 'key')->all()
        );

        return $all[$key] ?? $default; // لو الإعداد مش موجود يرجع القيمة الافتراضية
    }
}
