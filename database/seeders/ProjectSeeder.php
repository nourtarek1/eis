<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Models\Project;
use App\Models\Sector;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->projects() as $p) {
            Project::updateOrCreate(['title' => $p['title']], [
                'sector_id' => Sector::where('name', $p['sector'])->value('id'),
                'client' => $p['client'],
                'location' => $p['location'],
                'summary' => $p['summary'],
                'challenge' => $p['challenge'],
                'role' => $p['role'],
                'technical_delivery' => $p['delivery'],
                'outcome' => $p['outcome'],
                'highlights' => collect($p['highlights'])
                    ->map(fn(array $h) => ['value' => $h[0], 'label' => $h[1]])->all(), // [القيمة، الوصف]
                'status' => $p['status'],
                'is_featured' => $p['featured'] ?? false,
                'is_active' => true,
            ]);
        }
    }

    private function projects(): array
    {
        return [
            [
                'title' => 'Powering Precision Agriculture',
                'sector' => 'Agriculture & Irrigation',
                'client' => 'Vegeland Solution',
                'location' => 'Ismailia',
                'status' => ProjectStatus::Completed,
                'featured' => true,
                'summary' => 'Full EPC for the low-voltage network behind automated precision irrigation.',
                'challenge' => 'Design and deploy a fault-tolerant low-voltage network to automate precision irrigation across 6,000 acres with zero margin for error.',
                'role' => 'Full EPC Contractor — LV Infrastructure',
                'delivery' => [
                    'Complete LV system design including transformer sizing, power factor correction, and protection studies.',
                    'Supply and installation of Main Distribution Panels (MDPs), Soft-Starter Panels for all pump stations, and over 200 km of cabling and cable trays.',
                    'Integration of five automated pump stations with centralized control.',
                    'Full earthing, lighting, and site electrification.',
                ],
                'outcome' => 'A robust, commissioned electrical network delivering ~14 MW, enabling fully automated, hands-free irrigation and supporting future agricultural expansion.',
                'highlights' => [['6,000', 'Acres'], ['~14 MW', 'Power'], ['5', 'Pump stations'], ['Full LV', 'EPC']],
            ],
            [
                'title' => 'Integrated Electromechanical EPC for Port Logistics',
                'sector' => 'Ports & Logistics',
                'client' => 'Dekhila Port — Cement Silos Complex',
                'location' => 'Alexandria',
                'status' => ProjectStatus::Ongoing,
                'summary' => 'Lead electromechanical EPC and system integration for an 8-silo port complex.',
                'challenge' => 'Deliver the complete electrical infrastructure and auxiliary mechanical systems for 8 high-capacity silos (72,000 tons total), integrating locally designed systems with client-supplied equipment from China.',
                'role' => 'Lead Electromechanical EPC Contractor & System Integrator',
                'delivery' => [
                    'Electrical EPC: design, supply and installation of MV/HV systems (RMUs, Switchgear, Transformers), all MV/LV/control cabling, VFD panels and the Main Distribution Board (MDB) feeding the entire plant.',
                    'Integration: complete installation, termination, and commissioning of all client-supplied bulk handling equipment from China.',
                    'Mechanical scope: design, sizing and installation of the service compressed air system.',
                ],
                'outcome' => 'A seamlessly integrated facility where permanent infrastructure and imported machinery operate as one unified system, enabling automated ship loading.',
                'highlights' => [['8×9,000T', 'Silos'], ['Full', 'Electrical EPC'], ['Full', 'Integration'], ['Comp.', 'Air plant']],
            ],
            [
                'title' => 'Heavy Industrial Electrical & Mechanical Construction',
                'sector' => 'Industrial & Manufacturing',
                'client' => 'Deutsche Engineering for Steel Industries',
                'location' => 'Minya',
                'status' => ProjectStatus::Ongoing,
                'featured' => true,
                'summary' => 'Electrical, automation and mechanical works for an EAFD recycling plant.',
                'challenge' => 'Execute the complete electrical, automation, and mechanical auxiliary systems for a 150,000 TPY electric arc furnace dust (EAFD) recycling plant requiring robust, continuous operation.',
                'role' => 'Lead Electrical & Mechanical Construction Contractor',
                'delivery' => [
                    'Electrical & automation: turnkey installation of power distribution, Motor Control Centers (MCCs), plant-wide instrumentation (E&I), earthing/lightning protection, HVAC and complete lighting.',
                    'Mechanical support: installation of ancillary equipment including belt conveyors, hoppers, vibrators and associated steel structures.',
                    'Pre-commissioning: full pre-commissioning testing and support during commissioning.',
                ],
                'outcome' => 'A fully constructed and pre-commissioned electrical and mechanical backbone for a major sustainable recycling facility, ready for efficient operation.',
                'highlights' => [['150,000', 'TPY capacity'], ['Full', 'E&I construction'], ['Zero', 'Safety incidents'], ['Full', 'Mech. support']],
            ],
            [
                'title' => 'Full MEP Design for World-Class Manufacturing',
                'sector' => 'Industrial & Manufacturing',
                'client' => 'Ventura Industries — Cables Plant',
                'location' => 'Alexandria',
                'status' => ProjectStatus::Ongoing,
                'summary' => 'Complete MEP design package for a greenfield cable manufacturing facility.',
                'challenge' => 'Provide the complete MEP design for a 100,000 m² greenfield cable manufacturing facility, ensuring integration of all utilities and compliance with international standards.',
                'role' => 'Lead MEP Design Consultant',
                'delivery' => [
                    'Electrical design: power distribution, cable tray routing, cable schedules, and lighting layouts.',
                    'Mechanical design: plumbing, compressed air system, building ventilation, rainwater drainage, and dedicated pump rooms for firefighting and process water.',
                    'Coordination: full layout integration with architectural and structural disciplines.',
                ],
                'outcome' => 'A complete, code-compliant MEP design package that served as the technical blueprint for a modern, energy-efficient industrial facility.',
                'highlights' => [['100,000 m²', 'Site'], ['35,000 m²', 'Main building'], ['Full', 'MEP design'], ['Code', 'Compliant']],
            ],
            [
                'title' => 'Specialized Earthing & Safety for Oil & Gas',
                'sector' => 'Oil & Gas',
                'client' => 'EDCO Site (BP Sector)',
                'location' => 'Rashid, Egypt',
                'status' => ProjectStatus::Completed,
                'summary' => 'Turnkey earthing upgrade for critical buildings to oil & gas safety standards.',
                'challenge' => 'Upgrade and integrate the earthing system for critical buildings to meet stringent oil & gas safety standards and ensure seamless connection to the existing network.',
                'role' => 'Specialized Earthing System Contractor',
                'delivery' => [
                    'Turnkey installation of new earthing network, including excavation, electrode installation, conductor laying, and all terminations.',
                    'Certified earth resistance measurements and validation.',
                    "Full integration with the facility's existing grounding infrastructure.",
                ],
                'outcome' => 'A code-compliant, measured, and integrated earthing system that enhances personnel and asset protection for a major international operator.',
                'highlights' => [['Oil & Gas', 'Sector'], ['Certified', 'Earth measurement'], ['IEC', 'Standards'], ['Full', 'Supply & install']],
            ],
            [
                'title' => 'Solar Integration for Critical Infrastructure',
                'sector' => 'Renewable Energy',
                'client' => 'Pumping Station Facility',
                'location' => 'Egypt',
                'status' => ProjectStatus::Completed,
                'featured' => true,
                'summary' => 'Turnkey on-grid solar plant supporting essential water management systems.',
                'challenge' => 'Provide a reliable, on-grid renewable energy source to reduce operational costs and ensure power continuity for essential water management systems.',
                'role' => 'Turnkey EPC Solar Contractor',
                'delivery' => [
                    'Complete design, procurement, construction, and grid-connection of a 50 kWp photovoltaic solar system.',
                    'Structural and electrical engineering, panel and inverter installation, and grid-compliance interfacing.',
                ],
                'outcome' => 'A fully operational solar plant that supplements grid power, lowering energy expenditure and enhancing operational sustainability.',
                'highlights' => [['50 kWp', 'Capacity'], ['On-grid', 'Connection'], ['Full', 'EPC'], ['Renewable', 'Energy']],
            ],
            [
                'title' => 'Complete Fabrication for Tire Pyrolysis Production Line',
                'sector' => 'Industrial & Manufacturing',
                'client' => 'Enviroprocess',
                'location' => 'Minya, Egypt',
                'status' => ProjectStatus::Ongoing,
                'summary' => 'Heavy fabrication and supply of a complete tire pyrolysis line.',
                'challenge' => 'Design, fabricate, and supply a complete pyrolysis production line to convert end-of-life tires into valuable recovered products, requiring heavy fabrication and precise mechanical engineering.',
                'role' => 'Mechanical Fabrication & Supply Contractor',
                'delivery' => [
                    'Full fabrication and supply of the pyrolysis reactor vessel, classifiers, storage tanks, and all associated steel structures.',
                    'Design and fabrication of screw conveyors for material handling and feeding systems.',
                    'Comprehensive workshop fabrication including rolling, welding, heat treatment and NDE.',
                ],
                'outcome' => 'A fully fabricated, workshop-tested production line delivered to site, ready for installation and commissioning, enabling sustainable tire recycling operations.',
                'highlights' => [['Full line', 'Reactor & tanks'], ['Heavy', 'Fabrication'], ['NDE', 'Certified'], ['Turnkey', 'Supply']],
            ],
            [
                'title' => 'Full Mechanical Installation for Calcium Carbonate Processing',
                'sector' => 'Minerals & Building Materials',
                'client' => null,
                'location' => 'Egypt', // null = Confidential
                'status' => ProjectStatus::Ongoing,
                'summary' => 'Complete mechanical installation of a greenfield processing facility.',
                'challenge' => 'Execute the complete mechanical installation of a greenfield calcium carbonate processing facility, including all major process equipment and material handling systems.',
                'role' => 'Mechanical Installation Contractor',
                'delivery' => [
                    'Installation of all process equipment including roller mills, air separators, storage bins, and bucket elevators.',
                    'Assembly and installation of airslide conveyors and pneumatic conveying systems.',
                    'Steel structure erection and integration of equipment foundations.',
                ],
                'outcome' => 'A fully installed and mechanically commissioned processing plant, ready for electrical integration and commercial operation.',
                'highlights' => [['Full', 'Mech. install'], ['Greenfield', 'Project'], ['Mills &', 'Separators'], ['Airslide', 'Conveyors']],
            ],
            [
                'title' => 'Turnkey Electromechanical Installation for Talc Powder Plant',
                'sector' => 'Minerals & Building Materials',
                'client' => null,
                'location' => 'Egypt',
                'status' => ProjectStatus::Ongoing,
                'summary' => 'Turnkey electrical and mechanical installation for a talc powder facility.',
                'challenge' => 'Deliver complete electrical and mechanical installation for a talc powder production facility, including fabrication of steel structures and storage bins.',
                'role' => 'Electromechanical Installation Contractor',
                'delivery' => [
                    'Mechanical: installation of all processing equipment, fabrication and erection of steel structures and storage bins.',
                    'Electrical: full power distribution, motor control centers (MCC), cabling, and automation integration.',
                    'Coordination between mechanical and electrical disciplines for seamless system handover.',
                ],
                'outcome' => 'A fully integrated electromechanical plant, operational and delivering high-purity talc powder to specification.',
                'highlights' => [['Full', 'EM install'], ['Steel &', 'Bin fab'], ['Integrated', 'Power'], ['High-purity', 'Output']],
            ],
        ];
    }
}
