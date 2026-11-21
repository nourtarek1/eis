<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    public function run(): void
    {
        $names = [ // مقترحة من البروشور، والإدارة تعتمدها
            'Industrial & Manufacturing',
            'Oil & Gas',
            'Ports & Logistics',
            'Agriculture & Irrigation',
            'Renewable Energy',
            'Minerals & Building Materials',
        ];

        foreach ($names as $i => $name) {
            Sector::updateOrCreate(['name' => $name], ['sort_order' => $i + 1, 'is_active' => true]);
        }
    }
}
