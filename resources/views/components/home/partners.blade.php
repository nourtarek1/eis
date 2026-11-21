@props(['partners'])

@if ($partners->isNotEmpty())
    @php
        $repeat = max(4, (int) ceil(24 / $partners->count())); // عدد التكرارات عشان الشريط ميبانش فيه فراغ
        $duration = max(20, $partners->count() * 7); // الحركة أبطأ كل ما الشركاء أكتر
    @endphp

    <section class="border-t border-brand-mist">
        <div class="mx-auto max-w-7xl px-4 pt-20 sm:px-6 lg:px-8 lg:pt-28">
            <div class="reveal max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">Partners</p>
                <h2 class="mt-4 font-display text-3xl font-semibold text-brand-navy sm:text-4xl">Trusted partners</h2>
            </div>
        </div>

        <div
            class="overflow-hidden py-14 [mask-image:linear-gradient(to_right,transparent,black_8%,black_92%,transparent)]">
            {{-- تلاشي الأطراف --}}
            <div class="flex w-max hover:[animation-play-state:paused] motion-safe:animate-marquee motion-reduce:w-full motion-reduce:px-4"
                style="--marquee-shift: -{{ 100 / $repeat }}%; animation-duration: {{ $duration }}s">
                @for ($i = 0; $i < $repeat; $i++)
                    <ul class="flex shrink-0 gap-6 pr-6 motion-reduce:flex-wrap motion-reduce:justify-center {{ $i > 0 ? 'motion-reduce:hidden' : '' }}"
                        @if ($i > 0) aria-hidden="true" @endif> {{-- النسخ المكررة مخفية عن قارئ الشاشة --}}
                        @foreach ($partners as $partner)
                            @php $logo = $partner->getFirstMediaUrl('logo'); @endphp
                            <li>
                                @if ($partner->website_url)
                                    <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer"
                                        class="flex h-24 w-48 items-center justify-center rounded-xl border border-brand-mist px-6 transition-colors hover:border-brand-orange"
                                        @if ($i > 0) tabindex="-1" @endif>
                                    @else
                                        <div
                                            class="flex h-24 w-48 items-center justify-center rounded-xl border border-brand-mist px-6">
                                @endif
                                @if ($logo)
                                    <img src="{{ $logo }}" alt="{{ $partner->name }}" loading="lazy"
                                        class="max-h-12 w-auto object-contain opacity-70 grayscale transition hover:opacity-100 hover:grayscale-0">
                                    {{-- رمادي، وبيتلوّن عند hover --}}
                                @else
                                    <span
                                        class="font-display text-sm font-semibold text-brand-charcoal">{{ $partner->name }}</span>
                                @endif
                                @if ($partner->website_url)
                                    </a>
                                @else
            </div>
@endif
</li>
@endforeach
</ul>
@endfor
</div>
</div>
</section>
@endif
