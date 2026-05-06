@extends('backend.layout.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back')

@section('content')
<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
    <div class="flex items-center gap-4">
        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0d66b5]/10 text-lg font-bold text-[#0d66b5]">
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>

        <div>
            <p class="text-sm font-medium text-slate-500">Welcome</p>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">
                {{ auth()->user()->name ?? 'Admin' }}
            </h1>
        </div>
    </div>
</div>
@endsection
