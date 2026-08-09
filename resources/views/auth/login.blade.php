<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Universal Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center p-4 bg-slate-950 text-slate-100 antialiased">
    <div class="w-full max-w-md space-y-6">
        <div class="text-center space-y-1">
            <h1 class="text-2xl font-bold tracking-tight text-white">Sign in to Universal Panel</h1>
            <p class="text-xs text-slate-400">Enter your administrative credentials to continue</p>
        </div>

        @if(session('success'))
            <div class="p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-lg text-xs text-emerald-400">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-3 bg-rose-500/10 border border-rose-500/20 rounded-lg text-xs text-rose-400">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/admin/login" method="POST" class="bg-[#1d2327] border border-[#2c3338] rounded-2xl p-6 shadow-2xl space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-medium text-slate-300 mb-1.5">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com" class="w-full bg-[#101517] border border-[#2c3338] rounded-lg px-3 py-2 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors" />
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-medium text-slate-300">Password</label>
                    <a href="/admin/forgot-password" class="text-[11px] font-medium text-sky-400 hover:text-sky-300 transition-colors">Forgot password?</a>
                </div>
                <input id="password" type="password" name="password" required placeholder="••••••••" class="w-full bg-[#101517] border border-[#2c3338] rounded-lg px-3 py-2 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors" />
            </div>

            <div class="flex items-center gap-2">
                <input id="remember" type="checkbox" name="remember" class="rounded border-[#2c3338] bg-[#101517] text-[#2271b1] focus:ring-sky-500 w-3.5 h-3.5 cursor-pointer" />
                <label for="remember" class="text-xs text-slate-400 cursor-pointer select-none">Remember me for 30 days</label>
            </div>

            <button type="submit" class="w-full py-2.5 px-4 bg-[#2271b1] hover:bg-sky-600 text-white font-semibold text-xs rounded-lg transition-colors shadow-lg shadow-sky-500/20">
                Sign In
            </button>
        </form>

        <p class="text-center text-xs text-slate-500">
            Don't have an account? <a href="/admin/register" class="font-medium text-sky-400 hover:text-sky-300 transition-colors">Create Admin Account</a>
        </p>
    </div>
</body>
</html>
