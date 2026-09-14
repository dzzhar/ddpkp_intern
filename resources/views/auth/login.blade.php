@extends('layouts.app')
@section('title', 'Admin Login - Zharifah Dzikra')
@section('robots', 'noindex, nofollow')
@section('title', "Zharifah's Portfolio - Admin Login")

@section('content')
    <div class="min-h-screen flex items-center justify-center px-6 py-16">

        <div class="w-full max-w-md">
            <div class="mt-5 rounded-xl bg-slate-50 border border-slate-100 p-4">
                <p class="text-xs font-semibold text-slate-700 mb-2">
                    Demo Admin Account
                </p>

                <div class="space-y-1 text-xs text-slate-500">
                    <p>
                        <span class="font-medium text-slate-700">Email:</span>
                        admin@portfolio.com
                    </p>

                    <p>
                        <span class="font-medium text-slate-700">Password:</span>
                        password123
                    </p>
                </div>
            </div>

            <div class="text-center mb-8">
                <p class="text-sm font-semibold text-brand-500 uppercase tracking-wider">
                    Admin
                </p>

                <h1 class="font-heading text-3xl font-bold text-slate-950 mt-2">
                    Welcome Back
                </h1>

                <p class="text-sm text-slate-500 mt-2">
                    Sign in to manage your projects.
                </p>
            </div>

            <div class="rounded-3xl bg-white border border-slate-100 shadow-sm p-7">

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                            Email
                        </label>

                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-50"
                            placeholder="admin@example.com">

                        @error('email')
                            <p class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                            Password
                        </label>

                        <input id="password" type="password" name="password" required
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-50"
                            placeholder="••••••••">

                        @error('password')
                            <p class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-brand-500 px-4 py-3 text-sm font-semibold text-white hover:bg-brand-600 transition">
                        Sign In
                    </button>
                </form>
            </div>

            <div class="text-center mt-6">
                <a as="button" onclick="history.back()" class="text-sm text-slate-500 hover:text-brand-500">
                    ← Back
                </a>
            </div>

        </div>

    </div>
@endsection
