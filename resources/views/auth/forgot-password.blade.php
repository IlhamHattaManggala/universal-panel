<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Universal Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center p-4 bg-slate-950 text-slate-100 antialiased">
    <div class="w-full max-w-md space-y-6">
        <div class="text-center space-y-1">
            <h1 class="text-2xl font-bold tracking-tight text-white">Reset Password</h1>
            <p class="text-xs text-slate-400">Enter your email and we'll send you a password reset link</p>
        </div>

        @if(session('status'))
            <div class="p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-lg text-xs text-emerald-400">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-3 bg-rose-500/10 border border-rose-500/20 rounded-lg text-xs text-rose-400">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/admin/forgot-password" method="POST" class="bg-[#1d2327] border border-[#2c3338] rounded-2xl p-6 shadow-2xl space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-medium text-slate-300 mb-1.5">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com" class="w-full bg-[#101517] border border-[#2c3338] rounded-lg px-3 py-2 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors" />
            </div>

            <button type="submit" class="w-full py-2.5 px-4 bg-[#2271b1] hover:bg-sky-600 text-white font-semibold text-xs rounded-lg transition-colors shadow-lg shadow-sky-500/20">
                Send Reset Link
            </button>
        </form>

        <p class="text-center text-xs text-slate-500">
            Remembered password? <a href="/admin/login" class="font-medium text-sky-400 hover:text-sky-300 transition-colors">Return to Login</a>
        </p>
    </div>
</body>
</html>
