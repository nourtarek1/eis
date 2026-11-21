@php
    $capabilities = ['Electrical', 'Mechanical', 'Automation', 'MEP', 'EPC', 'Fabrication'];
    $projectsUrl = Route::has('projects.index') ? route('projects.index') : '#';
    $servicesUrl = Route::has('services.index') ? route('services.index') : '#';
@endphp

<section class="relative isolate overflow-hidden">
    <div class="bg-blueprint pointer-events-none absolute inset-0 -z-10" aria-hidden="true"></div> {{-- شبكة الخلفية --}}

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-8 lg:px-8 lg:py-28">
        <div>
            <p class="reveal flex items-center gap-3 text-sm font-semibold uppercase tracking-widest text-brand-navy">
                <span class="h-0.5 w-10 bg-brand-orange" aria-hidden="true"></span> Precision in Motion
            </p>

            <h1 class="reveal mt-6 font-display text-4xl font-semibold leading-tight text-brand-navy sm:text-5xl lg:text-6xl"
                style="transition-delay: 100ms"> {{-- تأخير بسيط لتتابع الظهور --}}
                Your partner for <span class="text-brand-orange">predictable, high-stakes execution</span>
            </h1>

            <p class="reveal mt-6 max-w-xl text-lg leading-relaxed" style="transition-delay: 200ms">
                Deep technical expertise and disciplined project management, from concept to commissioning.
            </p>

            <div class="reveal mt-9 flex flex-wrap gap-4" style="transition-delay: 300ms">
                <a href="{{ $projectsUrl }}"
                    class="rounded-md bg-brand-navy px-7 py-3.5 text-sm font-medium text-white transition-colors hover:bg-brand-charcoal">Explore
                    our projects</a>
                <a href="{{ $servicesUrl }}"
                    class="rounded-md border border-brand-navy px-7 py-3.5 text-sm font-medium text-brand-navy transition-colors hover:bg-brand-navy hover:text-white">Our
                    services</a>
            </div>

            <ul class="reveal mt-10 flex flex-wrap gap-2" style="transition-delay: 400ms"
                aria-label="Core capabilities">
                @foreach ($capabilities as $capability)
                    <li
                        class="rounded-full border border-brand-mist px-4 py-1.5 text-xs font-medium text-brand-charcoal">
                        {{ $capability }}</li>
                @endforeach
            </ul>
        </div>

        <div class="reveal mx-auto w-full max-w-md lg:max-w-lg" style="transition-delay: 200ms">
            <svg viewBox="0 0 460 410" class="h-auto w-full" role="img"
                aria-label="Interlocking gears with a power symbol">
                <g class="motion-safe:animate-gear" style="transform-origin: 176px 176px"> {{-- الترس الكبير يلف مع عقارب الساعة --}}
                    <path fill="#0A1F44" fill-rule="evenodd"
                        d="M287.2 241.5L306.3 261.8 L301.2 269.1 L275.5 258.1A129.0 129.0 0 0 1 266.4 268.0L279.7 292.6 L272.8 298.3 L250.9 281.0A129.0 129.0 0 0 1 239.5 288.3L246.0 315.4 L237.8 319.2 L221.2 296.8A129.0 129.0 0 0 1 208.3 300.9L207.5 328.8 L198.7 330.3 L188.4 304.4A129.0 129.0 0 0 1 174.9 305.0L166.9 331.7 L157.9 331.0 L154.7 303.2A129.0 129.0 0 0 1 141.5 300.3L126.9 324.1 L118.4 321.0 L122.5 293.4A129.0 129.0 0 0 1 110.5 287.2L90.2 306.3 L82.9 301.2 L93.9 275.5A129.0 129.0 0 0 1 84.0 266.4L59.4 279.7 L53.7 272.8 L71.0 250.9A129.0 129.0 0 0 1 63.7 239.5L36.6 246.0 L32.8 237.8 L55.2 221.2A129.0 129.0 0 0 1 51.1 208.3L23.2 207.5 L21.7 198.7 L47.6 188.4A129.0 129.0 0 0 1 47.0 174.9L20.3 166.9 L21.0 157.9 L48.8 154.7A129.0 129.0 0 0 1 51.7 141.5L27.9 126.9 L31.0 118.4 L58.6 122.5A129.0 129.0 0 0 1 64.8 110.5L45.7 90.2 L50.8 82.9 L76.5 93.9A129.0 129.0 0 0 1 85.6 84.0L72.3 59.4 L79.2 53.7 L101.1 71.0A129.0 129.0 0 0 1 112.5 63.7L106.0 36.6 L114.2 32.8 L130.8 55.2A129.0 129.0 0 0 1 143.7 51.1L144.5 23.2 L153.3 21.7 L163.6 47.6A129.0 129.0 0 0 1 177.1 47.0L185.1 20.3 L194.1 21.0 L197.3 48.8A129.0 129.0 0 0 1 210.5 51.7L225.1 27.9 L233.6 31.0 L229.5 58.6A129.0 129.0 0 0 1 241.5 64.8L261.8 45.7 L269.1 50.8 L258.1 76.5A129.0 129.0 0 0 1 268.0 85.6L292.6 72.3 L298.3 79.2 L281.0 101.1A129.0 129.0 0 0 1 288.3 112.5L315.4 106.0 L319.2 114.2 L296.8 130.8A129.0 129.0 0 0 1 300.9 143.7L328.8 144.5 L330.3 153.3 L304.4 163.6A129.0 129.0 0 0 1 305.0 177.1L331.7 185.1 L331.0 194.1 L303.2 197.3A129.0 129.0 0 0 1 300.3 210.5L324.1 225.1 L321.0 233.6 L293.4 229.5A129.0 129.0 0 0 1 287.2 241.5ZM76.0 176.0a100 100 0 1 0 200 0a100 100 0 1 0 -200 0Z" />
                    <circle cx="176" cy="176" r="82" fill="none" stroke="#5A5C5D" stroke-width="2"
                        stroke-dasharray="4 8" /> {{-- حلقة زخرفية --}}
                </g>

                <g class="motion-safe:animate-gear-reverse" style="transform-origin: 352.9px 299.9px">
                    {{-- الترس الصغير عكس الاتجاه وضعف السرعة --}}
                    <path fill="#E86634" fill-rule="evenodd"
                        d="M297.0 289.0L272.5 275.8 L275.8 266.7 L303.1 272.3A57.0 57.0 0 0 1 309.9 262.5L295.3 238.8 L302.7 232.5 L323.6 251.0A57.0 57.0 0 0 1 334.4 246.0L333.6 218.1 L343.1 216.5 L351.9 242.9A57.0 57.0 0 0 1 363.8 243.9L377.1 219.4 L386.2 222.7 L380.6 250.0A57.0 57.0 0 0 1 390.3 256.9L414.1 242.3 L420.3 249.7 L401.8 270.5A57.0 57.0 0 0 1 406.8 281.3L434.7 280.6 L436.4 290.1 L409.9 298.9A57.0 57.0 0 0 1 408.9 310.8L433.4 324.0 L430.1 333.1 L402.8 327.5A57.0 57.0 0 0 1 396.0 337.3L410.5 361.0 L403.1 367.2 L382.3 348.8A57.0 57.0 0 0 1 371.5 353.8L372.3 381.6 L362.7 383.3 L353.9 356.9A57.0 57.0 0 0 1 342.1 355.8L328.8 380.3 L319.7 377.0 L325.3 349.7A57.0 57.0 0 0 1 315.5 342.9L291.8 357.5 L285.6 350.1 L304.1 329.2A57.0 57.0 0 0 1 299.0 318.4L271.2 319.2 L269.5 309.7 L295.9 300.9A57.0 57.0 0 0 1 297.0 289.0ZM324.9 299.9a28 28 0 1 0 56 0a28 28 0 1 0 -56 0Z" />
                </g>

                <polygon points="192,124 144,190 174,190 162,240 212,166 182,166" fill="#E86634" />
                {{-- رمز الطاقة ثابت في نص الترس الكبير --}}
            </svg>
        </div>
    </div>
</section>
