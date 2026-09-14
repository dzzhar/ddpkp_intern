@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <x-navbar />

    <div class="min-h-screen bg-slate-50 py-10">
        <div class="max-w-3xl mx-auto px-5 sm:px-6">

            <div class="mb-8">
                <h1 class="font-heading text-3xl font-bold text-slate-950 mt-4">
                    Edit Project
                </h1>

                <p class="text-sm text-slate-500 mt-2">
                    Update your project information.
                </p>
            </div>

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Current Image
                        </label>

                        @if ($project->image)
                            <img src="{{ asset('storage/projects/' . $project->image) }}" alt="{{ $project->title }}"
                                class="w-48 h-32 object-cover rounded-xl border border-slate-200">
                        @else
                            <div class="w-48 h-32 rounded-xl bg-slate-100 flex items-center justify-center">
                                <span class="text-sm text-slate-400">
                                    No Image
                                </span>
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">
                            Change Image
                        </label>

                        <input type="file" name="image" id="image" accept="image/jpeg,image/png"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none
                                   file:mr-4 file:rounded-lg file:border-0
                                   file:bg-slate-100 file:px-4 file:py-2
                                   file:text-sm file:font-semibold file:text-slate-700
                                   focus:border-brand-500 focus:ring-2 focus:ring-brand-100">

                        <p class="text-xs text-slate-400 mt-2">
                            Leave empty if you don't want to change the image.
                        </p>

                        @error('image')
                            <p class="text-xs text-red-500 mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <x-form.input name="title" label="Project Title" :value="$project->title" />

                    <x-form.input name="type" label="Project Type" :value="$project->type" />

                    <x-form.textarea name="description" label="Description" :value="$project->description" :rows="5" />

                    <x-form.textarea name="skills" label="Skills" :value="$project->skills" :rows="3" />

                    <x-form.textarea name="project_goals" label="Project Goals" :value="$project->project_goals" :rows="4" />

                    <x-form.textarea name="project_role" label="Project Role" :value="$project->project_role" :rows="4" />

                    <x-form.textarea name="project_impact" label="Project Impact" :value="$project->project_impact" :rows="4" />

                    <x-form.textarea name="technology" label="Technology" :value="$project->technology" :rows="3" />

                </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
                    <button type="button" onclick="history.back()"
                        class="px-5 py-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-5 py-3 rounded-xl bg-slate-950 text-white text-sm font-semibold hover:bg-brand-500 transition">
                        Update Project
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
