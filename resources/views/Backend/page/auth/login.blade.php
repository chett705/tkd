<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — LED Events Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-[#0c0c14] text-gray-100 antialiased font-sans flex items-center justify-center min-h-screen">

    
    <div class="w-[600px] mx-auto ">

        {{-- Logo --}}
        <div class="flex flex-col items-center mb-8">
            <div class="w-14 h-14 bg-orange-500 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                    <path d="M8 21h8M12 17v4"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white">LED Events</h1>
            <p class="text-sm text-gray-400 mt-1">Sign in to Admin Panel</p>
        </div>

        {{-- Card --}}
        <div class="rounded-2xl border border-orange-500/10 bg-[#1a1a2e] p-8 shadow-xl">

            {{-- Errors --}}
            @if ($errors->any())
                <div class="mb-5 flex items-start gap-3 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                    <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"/>
                    </svg>
                    <div>{{ $errors->first() }}</div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-1.5">Email address</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-gray-600
                        focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500/30 transition
                        @error('email') border-red-500 @enderror"
                        placeholder="admin@led.com"
                    >
                </div>

                {{-- Password --}}
                <div x-data="{ show: false }">
                    <label class="block text-xs text-gray-400 mb-1.5">Password</label>

                    <div class="relative">
                        <input
                            :type="show ? 'text' : 'password'"
                            name="password"
                            required
                            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-gray-600
                            focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500/30 transition"
                            placeholder="••••••••"
                        >

                        {{-- Toggle --}}
                        <button type="button"
                            @click="show = !show"
                            class="absolute right-3 top-2.5 text-gray-400 hover:text-orange-400 text-xs">
                            <span x-text="show ? 'Hide' : 'Show'"></span>
                        </button>
                    </div>
                </div>

                {{-- Remember + Forgot --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-white/20 bg-white/5 text-orange-500 focus:ring-orange-500">
                        <span class="text-xs text-gray-400">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                        class="text-xs text-orange-400 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-lg bg-orange-500 hover:bg-orange-400 active:bg-orange-600
                    text-white text-sm font-semibold py-2.5 transition flex items-center justify-center gap-2">

                    <svg class="w-4 h-4 animate-spin hidden" id="loadingIcon" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>

                    <span>Sign in</span>
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-600 mt-6">
            LED Events &copy; {{ date('Y') }} — Admin Panel
        </p>
    </div> 

</body>
</html>
