@php
    $slides = collect(config('hero.slides', []));
    $total = $slides->count() + 1;
@endphp

<section x-data="heroSlider({{ $total }})" @mouseenter="paused = true" @mouseleave="paused = false" @focusin="paused = true"
    @focusout="if (!$el.contains($event.relatedTarget)) paused = false" @keydown.arrow-right.prevent="next()"
    @keydown.arrow-left.prevent="prev()" tabindex="0" role="region" aria-roledescription="carousel"
    aria-label="Featured highlights">
    {{-- Slides Container --}}
    <div class="grid" :aria-live="paused ? 'polite' : 'off'">

        {{-- First Slide: Main Hero --}}
        <div class="col-start-1 row-start-1 transition-opacity duration-700 motion-reduce:transition-none"
            :class="current === 0 ? 'z-10 opacity-100' : 'pointer-events-none opacity-0'" :aria-hidden="current !== 0"
            :inert="current !== 0" role="group" aria-roledescription="slide" aria-label="1 of {{ $total }}">
            <x-home.hero />
        </div>

        {{-- Dynamic Slides --}}
        @foreach ($slides as $slide)
            @php
                $index = $loop->iteration;

                $image = $slide['image'] ?? null;

                $hasImage = $image && file_exists(public_path($image));

                $routeName = $slide['route'] ?? null;

                $url = $routeName && Route::has($routeName) ? route($routeName) : '#';
            @endphp

            <div class="relative col-start-1 row-start-1 flex min-h-[28rem] items-center overflow-hidden bg-brand-navy transition-opacity duration-700 motion-reduce:transition-none"
                :class="current === {{ $index }} ? 'z-10 opacity-100' : 'pointer-events-none opacity-0'"
                :aria-hidden="current !== {{ $index }}" :inert="current !== {{ $index }}" role="group"
                aria-roledescription="slide" aria-label="{{ $index + 1 }} of {{ $total }}">

                {{-- Background Image --}}
                @if ($hasImage)
                    <img src="{{ asset($slide['image']) }}" alt="" loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-[9000ms] ease-out motion-reduce:transition-none"
                        :class="current === {{ $index }} ? 'scale-110' : 'scale-100'"> {{-- الصورة بتتكبّر ببطء على السلايد النشط --}}
                @endif

                {{-- Dark Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-r from-brand-navy/90 via-brand-navy/60 to-brand-navy/10"
                    aria-hidden="true"></div>

                {{-- Slide Content --}}
                <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 lg:px-8">

                    <p class="flex items-center gap-3 text-sm font-semibold uppercase tracking-widest text-white">
                        <span class="h-0.5 w-10 bg-brand-orange" aria-hidden="true"></span>
                        {{ $slide['eyebrow'] ?? '' }}
                    </p>

                    <h2
                        class="mt-6 max-w-2xl font-display text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-6xl">
                        {{ $slide['title'] ?? '' }}
                    </h2>

                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/85">
                        {{ $slide['text'] ?? '' }}
                    </p>

                    <a href="{{ $url }}"
                        class="mt-9 inline-flex rounded-md bg-white px-7 py-3.5 text-sm font-medium text-brand-navy transition-colors hover:bg-brand-mist">
                        {{ $slide['label'] ?? 'Learn more' }}
                    </a>

                </div>
            </div>
        @endforeach

    </div>

    {{-- Slider Controls --}}
    <div class="border-y border-brand-mist bg-white">

        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-4 sm:px-6 lg:px-8">

            {{-- Slide Counter & Progress --}}
            <div class="flex items-center gap-5">

                <p class="font-display text-sm font-semibold text-brand-navy">
                    <span x-text="String(current + 1).padStart(2, '0')"></span>

                    <span class="text-brand-charcoal">
                        / {{ str_pad((string) $total, 2, '0', STR_PAD_LEFT) }}
                    </span>
                </p>

                @if ($total > 1)
                    <div class="h-0.5 w-24 overflow-hidden bg-brand-mist sm:w-48 motion-reduce:hidden"
                        aria-hidden="true">
                        <template x-for="n in [current]" :key="n">
                            <span class="block h-full origin-left bg-brand-orange motion-safe:animate-progress"
                                :style="paused ? 'animation-play-state: paused' : ''" @animationend="next()"></span>
                        </template>
                    </div>
                @endif

            </div>

            {{-- Navigation Buttons --}}
            @if ($total > 1)
                <div class="flex gap-2">

                    <button type="button" @click="prev()" aria-label="Previous slide"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-brand-navy text-brand-navy transition-colors hover:bg-brand-navy hover:text-white">
                        <span aria-hidden="true">&larr;</span>
                    </button>

                    <button type="button" @click="next()" aria-label="Next slide"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-brand-navy text-brand-navy transition-colors hover:bg-brand-navy hover:text-white">
                        <span aria-hidden="true">&rarr;</span>
                    </button>

                </div>
            @endif

        </div>
    </div>

</section>
