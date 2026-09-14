@props(['projects'])

<section id="projects" class="py-20">

    <div class="max-w-6xl mx-auto px-6">

        {{-- Header --}}
        <div class="flex items-end justify-between">
            <div>
                <p class="text-sm font-semibold text-brand-500 uppercase tracking-wider">
                    My Work
                </p>

                <h2 class="font-heading text-3xl sm:text-4xl font-bold text-slate-950 mt-2">
                    Featured Projects
                </h2>
            </div>

            <a href="{{ route('grid') }}"
                class="inline-flex items-center gap-2 rounded-full bg-brand-500 text-white px-5 py-3 text-sm font-semibold hover:bg-slate-950 transition">
                More Project
                <span>→</span>
            </a>
        </div>

        {{-- Projects --}}
        <div class="flex gap-6 mt-10 overflow-x-auto pb-4 lg:overflow-x-visible lg:pb-0">

            @forelse ($projects as $project)
                <div class="shrink-0 w-[85%] sm:w-[55%] lg:w-[calc((100%-3rem)/3)]">
                    <x-project-card :project="$project" />
                </div>

            @empty

                <p class="text-slate-500">
                    No projects available yet.
                </p>
            @endforelse

        </div>

    </div>

</section>
