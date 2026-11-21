@props(['sectors'])

@if ($sectors->isNotEmpty()) {{-- مفيش قطاعات معتمدة = القسم مايظهرش --}}
    <section class="border-t border-brand-mist">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-3 lg:px-8 lg:py-28">
            <div class="reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">Sectors</p>
                <h2 class="mt-4 font-display text-3xl font-semibold text-brand-navy sm:text-4xl">Industries we serve</h2>
                <p class="mt-4 leading-relaxed">Engineering experience across the sectors that power industry.</p>
                {{-- نص مؤقت --}}
            </div>

            <ul class="divide-y divide-brand-mist border-y border-brand-mist lg:col-span-2">
                @foreach ($sectors as $sector)
                    <li class="reveal" style="transition-delay: {{ ($loop->index % 4) * 80 }}ms">
                        <a href="{{ Route::has('industries') ? route('industries') : '#' }}"
                            class="group flex items-center justify-between py-6">
                            <span class="flex items-baseline gap-5">
                                <span
                                    class="font-display text-sm font-semibold text-brand-orange">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span
                                    class="font-display text-xl font-semibold text-brand-navy transition-transform duration-300 group-hover:translate-x-2 sm:text-2xl">{{ $sector->name }}</span>
                            </span>
                            <span
                                class="text-brand-navy transition duration-300 group-hover:translate-x-1 group-hover:text-brand-orange"
                                aria-hidden="true">&rarr;</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
