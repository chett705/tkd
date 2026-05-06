<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - TK&amp;D Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-[radial-gradient(circle_at_top,_rgba(13,102,181,0.22),_transparent_32%),linear-gradient(135deg,#f3f5f9_0%,#dce2ea_48%,#c1c8d4_100%)] text-slate-900 antialiased font-sans flex items-center justify-center min-h-screen">

    <div class="w-[600px] max-w-full px-4 mx-auto">

        <div class="flex flex-col items-center mb-8">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#0d66b5] via-[#0a4f97] to-[#08356f] flex items-center justify-center mb-4 shadow-[0_18px_45px_rgba(8,53,111,0.28)] ring-4 ring-white/70">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                    <path d="M8 21h8M12 17v4"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-[#0a3d86]">TK&amp;D</h1>
            <p class="text-sm text-slate-600 mt-1">Sign in to Admin Panel</p>
        </div>

        <div class="rounded-3xl border border-white/70 bg-white/88 p-8 shadow-[0_28px_80px_rgba(8,53,111,0.18)] backdrop-blur">

            @if ($errors->any())
                <div class="mb-5 flex items-start gap-3 rounded-xl border border-[#c8102e]/25 bg-[#c8102e]/8 px-4 py-3 text-sm text-[#b20e29]">
                    <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"/>
                    </svg>
                    <div>{{ $errors->first() }}</div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs text-slate-600 mb-1.5">Email address</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0d66b5] focus:ring-2 focus:ring-[#0d66b5]/15 transition @error('email') border-red-500 @enderror"
                        placeholder="admin@tkd.com"
                    >
                </div>

                <div x-data="{ show: false }">
                    <label class="block text-xs text-slate-600 mb-1.5">Password</label>

                    <div class="relative">
                        <input
                            :type="show ? 'text' : 'password'"
                            name="password"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0d66b5] focus:ring-2 focus:ring-[#0d66b5]/15 transition"
                            placeholder="........"
                        >

                        <button
                            type="button"
                            @click="show = !show"
                            class="absolute right-3 top-2.5 text-slate-500 hover:text-[#c8102e] text-xs"
                        >
                            <span x-text="show ? 'Hide' : 'Show'"></span>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 bg-white text-[#0d66b5] focus:ring-[#0d66b5]">
                        <span class="text-xs text-slate-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-[#c8102e] hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-gradient-to-r from-[#0d66b5] via-[#0a4f97] to-[#08356f] hover:from-[#0f72c7] hover:to-[#0a3d86] active:from-[#08356f] active:to-[#062a57] text-white text-sm font-semibold py-2.5 transition flex items-center justify-center gap-2 shadow-[0_16px_35px_rgba(8,53,111,0.22)]"
                >
                    <svg class="w-4 h-4 animate-spin hidden" id="loadingIcon" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>

                    <span>Sign in</span>
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-slate-500 mt-6">
            TK&amp;D &copy; {{ date('Y') }} - Admin Panel
        </p>
    </div>

</body>
</html>

