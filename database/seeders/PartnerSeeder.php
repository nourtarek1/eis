<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $names = [ // من صفحة "Partners in Progress"، واللوجوهات الأصلية بتترفع بعدين من اللوحة
            'El Omran',
            'SESCO Trans',
            'Siemens',
            'Elsewedy Electric',
            'Sea Port Fire Fighting Sector',
            'Royal El Minya Cement Co.',
            'Vegeland',
            'Schneider Electric',
            'Deutsche Engineering',
            'Cleopatra Industries',
            'Ventura Industries',
            'Petrojet',
        ];

        foreach ($names as $i => $name) {
            Partner::updateOrCreate(['name' => $name], ['sort_order' => $i + 1, 'is_active' => true]);
        }
    }
}
