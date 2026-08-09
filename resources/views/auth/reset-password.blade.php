<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password - Universal Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center p-4 bg-slate-950 text-slate-100 antialiased">
    <div class="w-full max-w-md space-y-6">
        <div class="text-center space-y-2">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-[#2271b1] text-white shadow-lg shadow-sky-500/20 mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-white">Set New Password</h1>
            <p class="text-xs text-slate-400">Please choose a strong password to protect your account</p>
        </div>

        @if($errors->any())
            <div class="p-3 bg-rose-500/10 border border-rose-500/20 rounded-lg text-xs text-rose-400">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/admin/reset-password" method="POST" class="bg-[#1d2327] border border-[#2c3338] rounded-2xl p-6 shadow-2xl space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}" />

            <div>
                <label for="email" class="block text-xs font-medium text-slate-300 mb-1.5">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com" class="w-full bg-[#101517] border border-[#2c3338] rounded-lg px-3 py-2 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors" />
            </div>

            <div>
                <label for="password" class="block text-xs font-medium text-slate-300 mb-1.5">New Password</label>
                <input id="password" type="password" name="password" required placeholder="Minimum 8 characters" class="w-full bg-[#101517] border border-[#2c3338] rounded-lg px-3 py-2 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-medium text-slate-300 mb-1.5">Confirm New Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Re-type password" class="w-full bg-[#101517] border border-[#2c3338] rounded-lg px-3 py-2 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors" />
            </div>

            <button type="submit" class="w-full py-2.5 px-4 bg-[#2271b1] hover:bg-sky-600 text-white font-semibold text-xs rounded-lg transition-colors shadow-lg shadow-sky-500/20">
                Update Password
            </button>
        </form>

        <p class="text-center text-xs text-slate-500">
            Remembered password? <a href="/admin/login" class="font-medium text-sky-400 hover:text-sky-300 transition-colors">Return to Login</a>
        </p>
    </div>
</body>
</html>
