@extends('layouts.app')
@section('description',
    'Zharifah Dzikra adalah Frontend dan Web Developer yang berfokus pada pengembangan web
    menggunakan React.js dan Laravel.')

@section('title', "Zharifah's Portfolio - Home")
@section('content')
    <x-navbar />
    <main>
        <x-hero />
        <x-skills />
        <x-projects :projects="$projects" />
        <x-experience />
        <x-contact />
    </main>
    <x-footer />
@endsection
