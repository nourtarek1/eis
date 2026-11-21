@php
    $stats = [
        ['20', '+', 'Years of combined experience'],
        ['9', '+', 'Flagship projects delivered'],
        ['100', '%', 'EPC from design to commissioning'],
    ];
@endphp

<section class="border-t border-brand-mist">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-10 lg:grid-cols-2 lg:gap-16">
            <div class="reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">Who we are</p>
                <h2 class="mt-4 font-display text-3xl font-semibold leading-tight text-brand-navy sm:text-4xl">Built on
                    experience, driven by results</h2>
            </div>
            <div class="reveal space-y-5 text-lg leading-relaxed" style="transition-delay: 150ms">
                <p>EIS is a specialized EPC contractor operating in the mechanical and electrical industrial and MEP
                    sectors. Our leadership brings over 20 years of combined hands-on experience executing complex
                    projects across Egypt.</p>
                <p>We have built a focused, agile company where deep technical expertise is directly accessible to our
                    partners.</p>
                <a href="{{ Route::has('about') ? route('about') : '#' }}"
                    class="group flex items-center justify-between px-2 py-6 transition-colors duration-300 hover:bg-brand-mist/40"
                    Learn more about EIS <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>

        <dl class="mt-16 grid gap-10 border-t border-brand-mist pt-12 sm:grid-cols-3">
            @foreach ($stats as [$number, $suffix, $label])
                <div class="reveal" style="transition-delay: {{ $loop->index * 100 }}ms">
                    <dt class="font-display text-5xl font-semibold text-brand-navy lg:text-6xl"
                        data-count-to="{{ $number }}" data-suffix="{{ $suffix }}">
                        {{ $number }}{{ $suffix }}</dt>
                    <dd class="mt-3 border-t-2 border-brand-orange pt-3 text-sm">{{ $label }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
