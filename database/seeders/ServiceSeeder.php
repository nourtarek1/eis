<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [ // الأسماء من العرض الفني، والتفاصيل من البروشور
            [
                'Electrical Engineering & Design',
                'Design, supply and installation of MV/LV power distribution, substations, earthing and lighting.',
                ['MV/LV power distribution', 'Substations & switchgear (RMU, AIS/GIS)', 'Transformer installation', 'Earthing, lightning & cathodic protection', 'Lighting (indoor, outdoor, street)']
            ],
            [
                'Industrial Automation & Control',
                'Motor control, drives and PLC, DCS and SCADA integration for continuous plant operation.',
                ['Motor control centers (MCC)', 'VFD & soft-starter panels', 'PLC, DCS & SCADA integration', 'CCTV, fire alarm, data & access control']
            ],
            [
                'Mechanical Engineering & Installation',
                'Heavy equipment installation, steel structures and process mechanical works.',
                ['Heavy equipment installation (conveyors, mills, kilns)', 'Steel structure fabrication & erection', 'Process mechanical support', 'Pyrolysis reactor & pressure vessel fabrication']
            ],
            [
                'MEP Engineering',
                'Integrated mechanical, electrical and plumbing design and execution.',
                ['Piping & compressed air systems', 'HVAC (DX, chilled water, ventilation)', 'Plumbing, drainage & water supply', 'Firefighting (sprinkler, standpipe, suppression)', 'Pump stations & irrigation networks']
            ],
            [
                'EPC & Construction',
                'Single-point EPC delivery from concept to commissioning.',
                ['Electromechanical EPC', 'System integration', 'Heavy industrial fabrication & installation']
            ],
            [
                'Project Management',
                'Planning, scheduling, procurement and tracking that keep every project on its critical path.',
                ['Planning & scheduling', 'Procurement management', 'Progress tracking']
            ],
            [
                'Energy Solutions / Solar',
                'Turnkey on-grid solar systems, from design to grid connection.',
                ['Design & procurement', 'Structural and electrical engineering', 'Panel and inverter installation', 'Grid-compliance interfacing']
            ],
            [
                'Testing & Commissioning',
                'Systems verified to perform as designed, with after-sales support.',
                ['MV switchgear testing', 'VFD tuning', 'HVAC balancing', 'Sequence automation']
            ],
        ];

        foreach ($services as $i => [$title, $summary, $capabilities]) {
            Service::updateOrCreate(['title' => $title], [ // يتحدّث لو موجود
                'summary' => $summary,
                'capabilities' => $capabilities,
                'sort_order' => $i + 1,
                'is_active' => true,
            ]);
        }
    }
}
