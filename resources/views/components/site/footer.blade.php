@php
    use App\Models\Setting; // القيم بتتعدل من اللوحة، والثانية افتراضية
    $email = Setting::get('contact_email', 'info@eisegy.com');
    $phone = Setting::get('contact_phone', '+02 224031927');
    $address = Setting::get('contact_address', 'Office 1003, Building C, B Square Mall, Nasr City, Cairo, Egypt');
@endphp

<footer class="bg-brand-navy text-white/70"> {{-- خلفية كحلي ونص أبيض شفاف --}}
    <div class="h-1 bg-brand-orange" aria-hidden="true"></div> {{-- شريط برتقالي رفيع في الأعلى --}}

    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
        <div>
            <img src="{{ asset('images/logo-white.png') }}" alt="Engineering Innovation Systems"
                class="h-14 w-auto">{{-- الفلتر بيحوّل اللوجو لأبيض عشان يبان على الكحلي --}}
            <p class="mt-4 text-sm">Precision in Motion | Energize Your Path</p>
        </div>

        <nav aria-label="Footer">
            <p class="text-sm font-semibold text-white">Explore</p>
            <ul class="mt-4 grid grid-cols-2 gap-2 text-sm">
                @foreach (config('site.nav') as $item)
                    <li>
                        <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
                            class="transition-colors hover:text-brand-orange">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <address class="space-y-2 text-sm not-italic">
            <p class="font-semibold text-white">Contact</p>
            <p>{{ $address }}</p>
            <p><a href="mailto:{{ $email }}"
                    class="transition-colors hover:text-brand-orange">{{ $email }}</a></p>
            <p><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}"
                    class="transition-colors hover:text-brand-orange">{{ $phone }}</a></p>
        </address>
    </div>

    <div class="border-t border-white/10 py-5 text-center text-xs text-white/50">
        &copy; {{ date('Y') }} Engineering Innovation Systems. All rights reserved.
    </div>
</footer>
