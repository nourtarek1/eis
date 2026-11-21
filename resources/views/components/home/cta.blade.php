<section class="relative isolate overflow-hidden border-t border-brand-mist">
    <div class="bg-blueprint pointer-events-none absolute inset-0 -z-10" aria-hidden="true"></div> {{-- شبكة الخلفية --}}
    <div class="reveal mx-auto max-w-4xl px-4 py-20 text-center sm:px-6 lg:py-28">
        <h2 class="font-display text-3xl font-semibold text-brand-navy sm:text-5xl">Let's build your project's certainty
        </h2>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed">
            Whether you need full EPC delivery, specialized installation, detailed design or heavy fabrication, the EIS
            team is ready to bring predictability and precision to your next undertaking.
        </p>
        <div class="mt-9 flex flex-wrap justify-center gap-4">
            <a href="{{ Route::has('contact') ? route('contact') : '#' }}"
                class="rounded-md bg-brand-navy px-8 py-4 text-sm font-medium text-white transition-colors hover:bg-brand-charcoal">Schedule
                a project assessment</a>
            <a href="{{ Route::has('projects.index') ? route('projects.index') : '#' }}"
                class="rounded-md border border-brand-navy px-8 py-4 text-sm font-medium text-brand-navy transition-colors hover:bg-brand-navy hover:text-white">See
                our work</a>
        </div>
    </div>
</section>
