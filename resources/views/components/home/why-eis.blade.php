@php
    $steps = [
        // منهجية الشغل من البروشور
        [
            'Expert design & engineering',
            'Tailored electrical, mechanical and MEP design that prioritizes efficiency, safety and constructability from the first draft. We use AutoCAD, Revit, EPLAN and ETAP.',
        ],
        [
            'Disciplined project management',
            'Our PMO is the central nerve centre, governing planning, scheduling, procurement and tracking to keep every project on its critical path.',
        ],
        [
            'Precision construction & installation',
            'Execution by certified engineers and skilled technicians, with rigorous on-site management for quality control, safety compliance and timely handover.',
        ],
        [
            'Commissioning & support',
            'We ensure all systems perform as designed, from MV switchgear testing to VFD tuning, HVAC balancing to sequence automation, with full after-sales support.',
        ],
    ];
@endphp

<section class="border-t border-brand-mist">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-3 lg:gap-16 lg:px-8 lg:py-28">
        <div class="reveal">
            <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">Why choose EIS</p>
            <h2 class="mt-4 font-display text-3xl font-semibold leading-tight text-brand-navy sm:text-4xl">From concept
                to commissioning, a single point of responsibility</h2>
            <p class="mt-5 leading-relaxed">We manage the entire project lifecycle under one roof, ensuring seamless
                coordination and clear accountability.</p>
        </div>

        <ol class="space-y-10 lg:col-span-2">
            @foreach ($steps as [$title, $text])
                <li class="reveal group flex gap-6" style="transition-delay: {{ $loop->index * 100 }}ms">
                    <span
                        class="flex h-14 w-14 shrink-0 items-center justify-center bg-brand-navy font-display text-xl font-semibold text-white transition-colors duration-300 group-hover:bg-brand-orange">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div>
                        <h3 class="font-display text-xl font-semibold text-brand-navy">{{ $title }}</h3>
                        <p class="mt-2 leading-relaxed">{{ $text }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
