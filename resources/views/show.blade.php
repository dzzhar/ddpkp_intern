@extends('layouts.app')

@section('title', "Zharifah's Portfolio - Detail Projects")
@section('description', Str::limit($project->description, 155))

@section('content')
    <x-navbar />
    <section class="max-w-5xl mx-auto px-6 pb-16">

        <div class="mt-10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>
                    <p class="text-sm font-semibold text-brand-500 uppercase tracking-wider">
                        {{ $project->type }}
                    </p>
                    <h1 class="font-heading text-4xl sm:text-5xl font-bold text-slate-950 mt-3">
                        {{ $project->title }}
                    </h1>

                    <p class="text-lg text-slate-500 leading-8 mt-3 max-w-3xl">
                        {{ $project->description }}
                    </p>
                </div>

                @auth
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-brand-500 text-white text-sm font-semibold hover:bg-brand-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this project?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-500 text-white text-sm font-semibold hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>


        <div class="mt-10 rounded-3xl overflow-hidden bg-slate-100">
            <img src="{{ asset('storage/projects/' . $project->image) }}" alt="{{ $project->title }}"
                class="w-full object-cover">
        </div>
        <div class="mt-10">
            <h2 class="font-heading text-xl font-semibold text-slate-950">
                Technology
            </h2>
            <div class="flex flex-wrap gap-2 mt-4">
                @foreach (explode(',', $project->technology) as $tech)
                    <span class="px-3 py-1.5 rounded-full bg-brand-50 text-brand-700 text-sm font-medium">
                        {{ trim($tech) }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mt-10">
            <div class="rounded-3xl border border-slate-100 bg-slate-50 p-7">
                <h2 class="font-heading text-xl font-semibold text-slate-950">
                    Project Goals
                </h2>
                <p class="text-slate-500 leading-7 mt-4">
                    {{ $project->project_goals }}
                </p>
            </div>

            <div class="rounded-3xl border border-slate-100 bg-slate-50 p-7">
                <h2 class="font-heading text-xl font-semibold text-slate-950">
                    My Role
                </h2>
                <p class="text-slate-500 leading-7 mt-4">
                    {{ $project->project_role }}
                </p>
            </div>
        </div>

        <div class="mt-6 rounded-3xl border border-slate-100 bg-white shadow-sm p-7">
            <h2 class="font-heading text-xl font-semibold text-slate-950">
                Impact
            </h2>
            <p class="text-slate-500 leading-7 mt-4">
                {{ $project->project_impact }}
            </p>
        </div>

        <div class="mt-10">
            <h2 class="font-heading text-xl font-semibold text-slate-950">
                Skills
            </h2>

            <div class="flex flex-wrap gap-2 mt-4">
                @foreach (explode(',', $project->skills) as $skill)
                    <span class="px-3 py-1.5 rounded-full bg-slate-100 text-slate-600 text-sm">
                        {{ trim($skill) }}
                    </span>
                @endforeach
            </div>
        </div>

    </section>
@endsection
