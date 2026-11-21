@props(['services'])

<section class="bg-brand-mist/40">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="reveal flex flex-wrap items-end justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">What we do</p>
                <h2 class="mt-4 font-display text-3xl font-semibold text-brand-navy sm:text-4xl">Core services</h2>
            </div>
            <a href="{{ Route::has('services.index') ? route('services.index') : '#' }}"
                class="font-medium text-brand-navy hover:text-brand-orange">
                View all services <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <div @class([
                    'reveal',
                    'lg:col-span-2' => in_array($loop->iteration, [1, 4, 6]),
                ]) {{-- كروت أعرض --}}
                    style="transition-delay: {{ ($loop->index % 3) * 100 }}ms">
                    <a href="{{ Route::has('services.show') ? route('services.show', $service) : '#' }}"
                        class="group relative flex h-full min-h-56 flex-col justify-between overflow-hidden rounded-xl border border-brand-mist bg-white p-7 transition duration-300 hover:-translate-y-1.5 hover:shadow-xl">
                        <span
                            class="font-display text-sm font-semibold text-brand-charcoal/50 transition-colors duration-300 group-hover:text-brand-orange">
                            {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <div>
                            <h3 class="font-display text-xl font-semibold text-brand-navy">{{ $service->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed">{{ $service->summary }}</p>
                            <span
                                class="mt-5 inline-flex translate-y-2 items-center gap-2 text-sm font-medium text-brand-navy opacity-0 transition duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                                Learn more <span class="transition-transform duration-300 group-hover:translate-x-1"
                                    aria-hidden="true">&rarr;</span>
                            </span> {{-- يظهر عند hover --}}
                        </div>
                        <span
                            class="absolute inset-x-0 bottom-0 h-1 origin-left scale-x-0 bg-brand-orange transition-transform duration-500 group-hover:scale-x-100"
                            aria-hidden="true"></span> {{-- خط برتقالي بيتمدد --}}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
