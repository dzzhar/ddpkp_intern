@props(['project'])

<article
    class="project-card group rounded-3xl overflow-hidden border border-slate-100 bg-white shadow-sm hover:shadow-soft transition">
    <div class="h-56 overflow-hidden bg-slate-100">
        <img src="{{ asset('/storage/projects/' . $project->image) }}" alt="{{ $project->title ?? 'Image' }}"
            class="w-full h-full object-cover object-top" onerror="this.src='{{ asset('images/logo.svg') }}' ">
    </div>

    <div class="p-6">
        <div class="flex items-center justify-between gap-3">
            <span class="text-xs font-semibold text-brand-600">
                {{ $project->category ?? '' }}
            </span>
            <span class="text-xs text-slate-400">
                {{ $project->year ?? '' }}
            </span>
        </div>

        <h3 class="font-heading text-xl font-semibold text-slate-950 mt-3">
            {{ $project->title ?? 'Title' }}
        </h3>

        <p class="text-sm text-slate-500 leading-6 mt-2 line-clamp-3">
            {{ $project->description ?? '' }}
        </p>

        <div class="flex flex-wrap gap-2 mt-4">
            @foreach ($project->tags ?? [] as $tag)
                <span class="tag">
                    {{ $tag ?? '' }}
                </span>
            @endforeach
        </div>

        <a href="{{ route('project.show', $project->id) }}"
            class="inline-flex items-center gap-1 mt-5 text-sm font-semibold text-brand-500 hover:text-brand-700">
            View project
            <span>→</span>
        </a>
    </div>
</article>
