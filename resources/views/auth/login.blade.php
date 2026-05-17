@extends('layouts.guest')
@section('title', 'Masuk — Profit SaaS')

@section('auth-content')
<div class="text-center mb-6">
    <h2 class="text-2xl font-black text-gray-900">Selamat Datang Kembali</h2>
    <p class="text-sm text-gray-500 mt-1">Masuk ke akun Profit SaaS Anda</p>
</div>

@if($errors->any())
<div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">{{ $errors->first() }}</div>
@endif
@if(session('status'))
<div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                   placeholder="nama@perusahaan.com">
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            <input type="password" id="pw" name="password" required autocomplete="current-password"
                   class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                   placeholder="••••••••">
            <button type="button" onclick="var p=document.getElementById('pw');p.type=p.type==='password'?'text':'password'"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
        </div>
    </div>

    <div class="flex items-center justify-between">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 text-brand-600 border-gray-300 rounded focus:ring-brand-500">
            <span class="text-sm text-gray-600">Ingat saya</span>
        </label>
        @if(Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors">Lupa password?</a>
        @endif
    </div>

    <button type="submit" class="block w-full text-center py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-brand-200 text-sm">
        Masuk ke Dashboard
    </button>
</form>
@endsection

@section('auth-footer')
<p class="text-sm text-gray-500">
    Belum punya akun?
    <a href="{{ route('register') }}" class="font-bold text-brand-600 hover:text-brand-700 transition-colors">Daftar gratis</a>
</p>
@endsection
