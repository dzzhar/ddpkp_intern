@extends('layouts.app')

@section('title', "Zharifah's Portfolio - All Projects")
@section('description',
    'Lihat berbagai proyek pengembangan web yang dibuat oleh Zharifah Dzikra menggunakan Laravel,
    React.js, Flutter, dan teknologi lainnya.')

@section('content')
    <x-navbar />
    <section class="pb-16">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-10">
                <p class="text-sm font-semibold text-brand-500 uppercase tracking-wider mt-6">
                    My Work
                </p>

                <h1 class="font-heading text-3xl sm:text-4xl font-bold text-slate-950 mt-2">
                    All Projects
                </h1>

                <p class="text-slate-500 mt-3">
                    A collection of projects I've worked on.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($projects as $project)
                    <div>
                        <x-project-card :project="$project" />
                    </div>

                @empty

                    <p class="text-slate-500 col-span-full">
                        No projects available yet.
                    </p>
                @endforelse

            </div>

            <div class="mt-10">
                {{ $projects->links() }}
            </div>

        </div>
    </section>

@endsection
