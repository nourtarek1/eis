@php
    $groups = [
        // من صفحة Capabilities at a Glance
        'Electrical & automation' => [
            'MV/LV power distribution',
            'Substations & switchgear (RMU, AIS/GIS)',
            'Transformer installation',
            'Motor control centers (MCC)',
            'VFD & soft-starter panels',
            'PLC, DCS & SCADA integration',
            'Earthing, lightning & cathodic protection',
            'CCTV, fire alarm, data & access control',
            'Lighting (indoor, outdoor, street)',
        ],
        'Mechanical & MEP' => [
            'Heavy equipment installation (conveyors, mills, kilns)',
            'Steel structure fabrication & erection',
            'Piping & compressed air systems',
            'HVAC (DX, chilled water, ventilation)',
            'Plumbing, drainage & water supply',
            'Firefighting (sprinkler, standpipe, suppression)',
            'Pump stations & irrigation networks',
            'Process mechanical support',
            'Pyrolysis reactor & pressure vessel fabrication',
        ],
    ];
    $fabrication = [
        'Cutting & edge preparation',
        'Rolling & drilling',
        'Manual & automatic welding',
        'Heat treatment',
        'Heavy machining',
        'NDE (RT, UT, MT, PT)',
        'Surface preparation & coating',
    ];
@endphp

<section class="bg-brand-navy text-white/80"> {{-- قسم كحلي زي البروشور --}}
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="reveal max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">Core capabilities</p>
            <h2 class="mt-4 font-display text-3xl font-semibold text-white sm:text-4xl">Capabilities at a glance</h2>
        </div>

        <div class="mt-14 grid gap-12 md:grid-cols-2">
            @foreach ($groups as $title => $items)
                <div class="reveal" style="transition-delay: {{ $loop->index * 120 }}ms">
                    <h3 class="font-display text-base font-semibold uppercase tracking-wider text-brand-orange">
                        {{ $title }}</h3>
                    <ul class="mt-6 space-y-3 text-sm sm:text-base">
                        @foreach ($items as $item)
                            <li class="flex gap-3 transition duration-300 hover:translate-x-1 hover:text-white">
                                </span>{{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="reveal mt-14 rounded-xl border border-white/15 p-8">
            <h3 class="font-display text-base font-semibold uppercase tracking-wider text-white">Equipped for heavy
                industrial fabrication & installation</h3>
            <ul class="mt-5 flex flex-wrap gap-2">
                @foreach ($fabrication as $item)
                    <li
                        class="rounded-full border border-white/20 px-4 py-1.5 text-xs transition-colors hover:border-brand-orange hover:text-white">
                        {{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
