@props(['projects'])

@if ($projects->isNotEmpty())
    <section class="bg-brand-mist/40">
        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="reveal flex flex-wrap items-end justify-between gap-6">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-brand-orange">Our work</p>
                    <h2 class="mt-4 font-display text-3xl font-semibold text-brand-navy sm:text-4xl">Featured projects
                    </h2>
                </div>
                <a href="{{ Route::has('projects.index') ? route('projects.index') : '#' }}"
                    class="font-medium text-brand-navy hover:text-brand-orange">
                    View all projects <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($projects as $project)
                    @php $image = $project->getFirstMediaUrl('cover', 'thumb'); @endphp
                    <div class="reveal" style="transition-delay: {{ $loop->index * 100 }}ms">
                        <a href="{{ Route::has('projects.show') ? route('projects.show', $project) : '#' }}"
                            class="group block h-full overflow-hidden rounded-xl border border-brand-mist bg-white transition duration-300 hover:-translate-y-1.5 hover:shadow-xl">
                            <div class="relative aspect-[4/3] overflow-hidden bg-brand-mist">
                                @if ($image)
                                    <img src="{{ $image }}" alt="{{ $project->title }}" loading="lazy"
                                        class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                                @else
                                    <div class="flex h-full items-center justify-center text-xs text-brand-charcoal">
                                        Project photo</div>
                                @endif
                                <span
                                    class="absolute bottom-4 left-4 translate-y-3 rounded-md bg-white px-4 py-2 text-xs font-semibold text-brand-navy opacity-0 transition duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                                    View project &rarr;
                                </span> {{-- شارة تظهر عند hover --}}
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-semibold uppercase tracking-widest text-brand-orange">
                                    {{ $project->sector?->name }}{{ $project->sector ? ' · ' : '' }}{{ $project->location }}
                                </p>
                                <h3 class="mt-3 font-display text-xl font-semibold text-brand-navy">
                                    {{ $project->title }}</h3>
                                <p class="mt-2 text-sm leading-relaxed">{{ $project->summary }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
