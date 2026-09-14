@extends('layouts.app')

@section('title', 'Add Project')

@section('content')
    <x-navbar />

    <div class="min-h-screen bg-slate-50 py-10">
        <div class="max-w-3xl mx-auto px-5 sm:px-6">

            <div class="mb-8">
                <h1 class="text-brand-500 font-heading text-3xl font-bold mt-4">
                    Add Project
                </h1>

                <p class="text-sm text-slate-500 mt-2">
                    Add a new project to your portfolio.
                </p>
            </div>

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
                @csrf

                <div class="space-y-6">

                    <div>
                        <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">
                            Image
                        </label>

                        <input type="file" name="image" id="image" accept="image/jpeg,image/png"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none
                                   file:mr-4 file:rounded-lg file:border-0
                                   file:bg-slate-100 file:px-4 file:py-2
                                   file:text-sm file:font-semibold file:text-slate-700
                                   focus:border-brand-500 focus:ring-2 focus:ring-brand-100">

                        @error('image')
                            <p class="text-xs text-red-500 mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <x-form.input name="title" label="Project Title" placeholder="Example: SISemut" />

                    <x-form.input name="type" label="Project Type" placeholder="Example: Web Application" />

                    <x-form.textarea name="description" label="Description" placeholder="Describe the project..."
                        :rows="5" />

                    <x-form.textarea name="skills" label="Skills"
                        placeholder="Example: Frontend Development, Backend Development, REST API" :rows="3" />

                    <x-form.textarea name="project_goals" label="Project Goals"
                        placeholder="What are the goals of this project?" :rows="4" />

                    <x-form.textarea name="project_role" label="Project Role"
                        placeholder="What was your role in this project?" :rows="4" />

                    <x-form.textarea name="project_impact" label="Project Impact"
                        placeholder="What was the impact or outcome of this project?" :rows="4" />

                    <x-form.textarea name="technology" label="Technology"
                        placeholder="Example: Laravel, Livewire, Filament, MySQL" :rows="3" />

                </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
                    <button type="button" onclick="history.back()"
                        class="px-5 py-3 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-5 py-3 rounded-xl bg-slate-950 text-white text-sm font-semibold hover:bg-brand-500 transition">
                        Save Project
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
