@php $links = config('site.nav'); @endphp {{-- القائمة من ملف الإعدادات --}}

<header x-data="{ open: false, scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 8" {{-- يتغير الشكل بعد 8 بكسل سكرول --}}
        :class="scrolled ? 'border-brand-mist bg-white/90 backdrop-blur' : 'border-transparent bg-white'"
        class="sticky top-0 z-40 border-b transition-colors duration-300">
    <div :class="scrolled ? 'h-16' : 'h-24'"
         class="mx-auto flex max-w-7xl items-center justify-between px-4 transition-all duration-300 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" aria-label="Engineering Innovation Systems home">
            <img src="{{ asset('images/logo.png') }}" alt="Engineering Innovation Systems"
     :class="scrolled ? 'h-11' : 'h-14'" class="w-auto transition-all duration-300">
        </a>

        <nav class="hidden items-center gap-8 lg:flex" aria-label="Main"> {{-- قائمة الديسكتوب --}}
            @foreach ($links as $item)
                <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                   @class([
                       'relative py-1 text-sm font-medium text-brand-navy after:absolute after:inset-x-0 after:-bottom-1 after:h-0.5 after:origin-left after:bg-brand-orange after:transition-transform hover:after:scale-x-100', {{-- خط برتقالي يظهر عند hover --}}
                       'after:scale-x-100' => request()->routeIs($item['route']), {{-- ثابت للصفحة الحالية --}}
                       'after:scale-x-0' => ! request()->routeIs($item['route']),
                   ])>{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <a href="{{ Route::has('contact') ? route('contact') : '#' }}"
           class="hidden rounded-md bg-brand-navy px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-charcoal lg:inline-flex">
            Get in touch
        </a>

        <button type="button" @click="open = ! open" :aria-expanded="open"
                class="p-2 text-brand-navy lg:hidden" aria-label="Toggle menu"> {{-- زر الموبايل --}}
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <nav x-show="open" x-cloak x-transition class="border-t border-brand-mist bg-white lg:hidden" aria-label="Mobile">
        <div class="space-y-1 px-4 py-3">
            @foreach ($links as $item)
                <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                   class="block rounded-md px-3 py-2.5 text-sm font-medium text-brand-navy hover:bg-brand-mist">{{ $item['label'] }}</a>
            @endforeach
        </div>
    </nav>
</header>
