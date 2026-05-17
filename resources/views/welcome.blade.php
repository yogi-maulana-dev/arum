@extends('layouts.base')

@section('title', 'Profit SaaS — Sistem Manajemen Arsip Digital Terpadu')
@section('description', 'Kelola arsip digital bisnis Anda dengan mudah, aman, dan efisien. Cocok untuk UKM hingga enterprise Indonesia.')

@section('content')

{{-- ====== NAVBAR ====== --}}
<nav id="navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <a href="/" class="flex items-center gap-2.5">
                <div class="w-9 h-9 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white">Profit<span class="text-indigo-200">SaaS</span></span>
            </a>

            <div class="hidden md:flex items-center gap-1">
                <a href="#fitur"      class="px-4 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-xl transition-all">Fitur</a>
                <a href="#cara-kerja" class="px-4 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-xl transition-all">Cara Kerja</a>
                <a href="#harga"      class="px-4 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-xl transition-all">Harga</a>
                <a href="#testimoni"  class="px-4 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-xl transition-all">Testimoni</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="hidden sm:block text-sm font-medium text-white/90 hover:text-white transition-colors">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="flex items-center gap-1.5 px-5 py-2 bg-white text-brand-700 text-sm font-bold rounded-xl hover:bg-indigo-50 transition-all shadow-lg shadow-brand-900/20">
                    Coba Gratis
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- ====== HERO ====== --}}
<section class="gradient-hero pt-28 pb-24 lg:pt-36 lg:pb-32 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-1/2 -right-1/4 w-[600px] h-[600px] bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-1/4 -left-1/4 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-4xl mx-auto">

            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-4 py-1.5 mb-7">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium text-white/90">Platform Terpercaya · 12.500+ Pengguna Aktif</span>
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.08] mb-6 tracking-tight">
                Arsip Digital Bisnis Anda<br>
                <span class="text-indigo-200">Lebih Cerdas & Aman</span>
            </h1>

            <p class="text-lg lg:text-xl text-indigo-100 mb-10 max-w-2xl mx-auto leading-relaxed">
                Satu platform untuk menyimpan, mengelola, dan berbagi dokumen perusahaan. Aman, terstruktur, dan bisa diakses kapan saja, di mana saja.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
                <a href="{{ route('register') }}"
                   class="flex items-center gap-2 bg-white text-brand-700 font-bold px-8 py-4 rounded-2xl hover:bg-indigo-50 transition-all shadow-2xl shadow-brand-900/30 text-base w-full sm:w-auto justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Mulai Gratis Sekarang
                </a>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 bg-white/10 border border-white/30 text-white font-semibold px-8 py-4 rounded-2xl hover:bg-white/20 transition-all text-base w-full sm:w-auto justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                    </svg>
                    Lihat Demo Langsung
                </a>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-white/70 text-sm">
                @foreach(['Tidak perlu kartu kredit', 'Setup 2 menit', 'Gratis 14 hari', 'Data 100% aman'] as $item)
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ $item }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- App screenshot mockup --}}
        <div class="mt-16 relative max-w-5xl mx-auto">
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-2.5 shadow-2xl">
                <div class="bg-white rounded-xl overflow-hidden shadow-xl">
                    {{-- Browser bar --}}
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border-b border-gray-100">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                        </div>
                        <div class="flex-1 mx-4 bg-gray-200 rounded-md h-5 max-w-xs"></div>
                    </div>
                    {{-- App UI --}}
                    <div class="flex" style="height:300px">
                        <div class="w-44 bg-gray-50 border-r border-gray-100 p-3 space-y-1 flex-shrink-0">
                            <div class="flex items-center gap-2 px-2 py-2 bg-brand-50 rounded-lg">
                                <div class="w-4 h-4 bg-brand-600 rounded"></div>
                                <div class="h-2.5 bg-brand-400/40 rounded w-14"></div>
                            </div>
                            @foreach(['w-12','w-16','w-10','w-14','w-11'] as $w)
                            <div class="flex items-center gap-2 px-2 py-2 rounded-lg">
                                <div class="w-4 h-4 bg-gray-200 rounded"></div>
                                <div class="h-2.5 bg-gray-200 rounded {{ $w }}"></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex-1 p-4">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-5 bg-gray-200 rounded-lg w-28"></div>
                                <div class="h-7 bg-brand-600 rounded-lg w-20"></div>
                            </div>
                            <div class="grid grid-cols-5 gap-2.5">
                                @foreach(['blue','green','red','yellow','purple','indigo','pink','orange','teal','cyan'] as $c)
                                <div class="bg-gray-50 border border-gray-100 rounded-xl p-3 card-hover">
                                    <div class="w-9 h-9 bg-{{ $c }}-100 rounded-lg mb-2 flex items-center justify-center">
                                        <div class="w-4 h-5 bg-{{ $c }}-400 rounded-sm"></div>
                                    </div>
                                    <div class="h-2 bg-gray-200 rounded mb-1"></div>
                                    <div class="h-1.5 bg-gray-100 rounded w-2/3"></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute -left-6 top-1/3 bg-white rounded-2xl shadow-xl border border-gray-100 px-4 py-3 hidden lg:flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-900">SSL 256-bit</p>
                    <p class="text-xs text-gray-500">Enkripsi penuh</p>
                </div>
            </div>

            <div class="absolute -right-6 bottom-1/4 bg-white rounded-2xl shadow-xl border border-gray-100 px-4 py-3 hidden lg:flex items-center gap-3">
                <div class="w-10 h-10 bg-brand-100 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-900">99.9% Uptime</p>
                    <p class="text-xs text-gray-500">SLA terjamin</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ====== TRUSTED BY ====== --}}
<section class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-8">Dipercaya oleh perusahaan-perusahaan terkemuka Indonesia</p>
        <div class="flex flex-wrap items-center justify-center gap-x-12 gap-y-4 opacity-40">
            @foreach(['PT. Maju Bersama','CV. Digital Nusantara','Koperasi Sejahtera','Yayasan Peduli Bangsa','PT. Arsip Mandiri','Bank Daerah Jaya'] as $co)
            <span class="text-base font-bold text-gray-600 whitespace-nowrap">{{ $co }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- ====== FEATURES ====== --}}
<section id="fitur" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-brand-50 text-brand-700 text-sm font-semibold rounded-full mb-4">Fitur Unggulan</span>
            <h2 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">
                Semua yang Dibutuhkan,<br>
                <span class="gradient-text">dalam Satu Platform</span>
            </h2>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">Dirancang untuk kebutuhan arsip bisnis Indonesia — lengkap, aman, dan mudah digunakan tanpa pelatihan khusus.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $features = [
                ['color'=>'brand','icon'=>'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z','title'=>'Penyimpanan Cloud Aman','desc'=>'Simpan semua dokumen di cloud dengan enkripsi AES-256. Data selalu aman dan dapat diakses kapan saja, di mana saja.'],
                ['color'=>'green','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z','title'=>'Kontrol Akses 3 Level','desc'=>'Role Super Admin, Admin, dan Viewer dengan hak akses berbeda. Pastikan dokumen sensitif hanya dapat diakses oleh pihak yang tepat.'],
                ['color'=>'blue','icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z','title'=>'Kolaborasi Tim Real-time','desc'=>'Bagikan dokumen ke anggota tim dengan izin baca atau edit. Kerjasama lebih mudah tanpa kirim file lewat email.'],
                ['color'=>'purple','icon'=>'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z','title'=>'Pencarian Full-text Cepat','desc'=>'Temukan dokumen dalam hitungan detik. Cari berdasarkan nama file, isi dokumen, tag, kategori, atau tanggal upload.'],
                ['color'=>'orange','icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01','title'=>'Audit Trail Otomatis','desc'=>'Setiap aktivitas terekam otomatis — siapa, kapan, apa yang diakses, diubah, atau dihapus. Penting untuk kepatuhan regulasi.'],
                ['color'=>'cyan','icon'=>'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12','title'=>'Upload Massal & Drag-Drop','desc'=>'Upload ratusan file sekaligus dengan antarmuka drag & drop yang intuitif. Mendukung semua format dokumen populer.'],
            ];
            @endphp

            @foreach($features as $f)
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 card-hover">
                <div class="w-12 h-12 bg-{{ $f['color'] }}-100 rounded-2xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-{{ $f['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $f['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ====== CARA KERJA ====== --}}
<section id="cara-kerja" class="py-20 bg-gradient-to-br from-gray-50 to-brand-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-brand-50 text-brand-700 text-sm font-semibold rounded-full mb-4">Cara Kerja</span>
            <h2 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">Mulai dalam 3 Langkah Mudah</h2>
            <p class="text-lg text-gray-500 max-w-xl mx-auto">Tidak perlu keahlian teknis. Setup dalam menit, manfaatkan selamanya.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 relative">
            <div class="hidden md:block absolute top-14 left-[calc(33%+2rem)] right-[calc(33%+2rem)] h-0.5 bg-gradient-to-r from-brand-200 via-brand-400 to-brand-200"></div>

            @php
            $steps = [
                ['n'=>'01','icon'=>'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z','title'=>'Buat Akun','desc'=>'Daftar gratis dalam 2 menit. Langsung aktif, tidak perlu kartu kredit. Pilih paket yang sesuai kebutuhan bisnis Anda.'],
                ['n'=>'02','icon'=>'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12','title'=>'Upload Dokumen','desc'=>'Drag & drop file atau pilih dari komputer. Buat struktur folder sesuai kebutuhan dan atur kategori dokumen.'],
                ['n'=>'03','icon'=>'M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z','title'=>'Kelola & Bagikan','desc'=>'Atur hak akses per pengguna, bagikan ke tim, dan pantau semua aktivitas dokumen secara real-time.'],
            ];
            @endphp

            @foreach($steps as $s)
            <div class="text-center relative">
                <div class="w-28 h-28 bg-white rounded-3xl shadow-lg shadow-brand-100 border border-brand-100 flex items-center justify-center mx-auto mb-6 relative z-10">
                    <div class="absolute -top-3 -right-3 w-8 h-8 bg-brand-600 rounded-full flex items-center justify-center shadow-md shadow-brand-400">
                        <span class="text-xs font-black text-white">{{ $s['n'] }}</span>
                    </div>
                    <svg class="w-12 h-12 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $s['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $s['title'] }}</h3>
                <p class="text-gray-500 leading-relaxed max-w-xs mx-auto">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ====== STATS ====== --}}
<section class="py-16 gradient-hero">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @foreach(['12.500+'=>'Pengguna Aktif','2.3 Juta'=>'Dokumen Tersimpan','99.9%'=>'Uptime SLA','500+'=>'Klien Perusahaan'] as $val=>$label)
            <div>
                <div class="text-4xl font-black text-white mb-1">{{ $val }}</div>
                <div class="text-indigo-200 text-sm font-medium">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ====== PRICING ====== --}}
<section id="harga" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-brand-50 text-brand-700 text-sm font-semibold rounded-full mb-4">Harga</span>
            <h2 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">Pilih Paket yang Tepat</h2>
            <p class="text-lg text-gray-500 max-w-xl mx-auto">Harga transparan, tanpa biaya tersembunyi. Mulai gratis, upgrade kapan saja.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">

            {{-- Starter --}}
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200 card-hover flex flex-col">
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Starter</h3>
                    <p class="text-sm text-gray-500 mb-5">Untuk individu & tim kecil</p>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-black text-gray-900">Gratis</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Selamanya, tanpa kartu kredit</p>
                </div>
                <ul class="space-y-2.5 mb-8 flex-1">
                    @foreach(['5 GB penyimpanan','Hingga 3 pengguna','Upload maks. 50 MB/file','Akses web & mobile','Dukungan via email'] as $item)
                    <li class="flex items-center gap-2.5 text-sm text-gray-600">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('register') }}" class="block text-center py-3 border-2 border-brand-200 text-brand-700 font-bold rounded-xl hover:bg-brand-50 transition-all text-sm">
                    Mulai Gratis
                </a>
            </div>

            {{-- Professional --}}
            <div class="bg-brand-600 rounded-2xl p-8 border border-brand-500 card-hover relative shadow-2xl shadow-brand-500/30 flex flex-col">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2">
                    <span class="bg-amber-400 text-amber-900 text-xs font-black px-4 py-1.5 rounded-full shadow-lg">⚡ TERPOPULER</span>
                </div>
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-white mb-1">Professional</h3>
                    <p class="text-indigo-200 text-sm mb-5">Untuk bisnis yang berkembang</p>
                    <div class="flex items-baseline gap-1">
                        <span class="text-sm text-indigo-200">Rp</span>
                        <span class="text-4xl font-black text-white">299.000</span>
                        <span class="text-indigo-200 text-sm">/bln</span>
                    </div>
                    <p class="text-xs text-indigo-200 mt-1">Hemat 20% jika bayar tahunan</p>
                </div>
                <ul class="space-y-2.5 mb-8 flex-1">
                    @foreach(['50 GB penyimpanan','Pengguna tidak terbatas','Upload maks. 2 GB/file','Semua fitur Starter','Audit trail lengkap','Kontrol akses 3 level','Integrasi API','Support prioritas 24/7'] as $item)
                    <li class="flex items-center gap-2.5 text-sm text-white">
                        <svg class="w-4 h-4 text-indigo-200 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('register') }}" class="block text-center py-3 bg-white text-brand-700 font-black rounded-xl hover:bg-indigo-50 transition-all text-sm shadow-lg">
                    Coba 14 Hari Gratis
                </a>
            </div>

            {{-- Enterprise --}}
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200 card-hover flex flex-col">
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Enterprise</h3>
                    <p class="text-sm text-gray-500 mb-5">Untuk organisasi besar</p>
                    <div class="flex items-baseline gap-1">
                        <span class="text-sm text-gray-400">Rp</span>
                        <span class="text-4xl font-black text-gray-900">799.000</span>
                        <span class="text-gray-400 text-sm">/bln</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Custom untuk kebutuhan spesifik Anda</p>
                </div>
                <ul class="space-y-2.5 mb-8 flex-1">
                    @foreach(['Storage tidak terbatas','Pengguna tidak terbatas','Semua fitur Professional','Dedicated server','Kustomisasi branding','SSO & LDAP','SLA 99.99%','Account manager pribadi'] as $item)
                    <li class="flex items-center gap-2.5 text-sm text-gray-600">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <a href="#" class="block text-center py-3 border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-100 transition-all text-sm">
                    Hubungi Sales
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ====== TESTIMONIALS ====== --}}
<section id="testimoni" class="py-20 bg-gradient-to-br from-gray-50 to-brand-50/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1.5 bg-brand-50 text-brand-700 text-sm font-semibold rounded-full mb-4">Testimoni</span>
            <h2 class="text-3xl lg:text-4xl font-black text-gray-900">Dipercaya Ribuan Pengguna</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testi = [
                ['name'=>'Budi Santoso','role'=>'Direktur Operasional','co'=>'PT. Maju Bersama','av'=>'BS','text'=>'Profit SaaS mengubah cara kami mengelola dokumen. Semua arsip tersentralisasi dan mudah ditemukan. Produktivitas tim meningkat 40% dalam sebulan pertama!'],
                ['name'=>'Sari Dewi Rahayu','role'=>'Manajer Keuangan','co'=>'CV. Digital Nusantara','av'=>'SD','text'=>'Fitur audit trail sangat membantu memenuhi kepatuhan regulasi keuangan kami. Setiap perubahan dokumen tercatat jelas. Luar biasa rekomendasinya!'],
                ['name'=>'Ahmad Fauzi','role'=>'IT Manager','co'=>'Koperasi Sejahtera','av'=>'AF','text'=>'Setup sangat mudah tanpa keahlian teknis khusus. Support tim juga sangat responsif. Ini adalah platform arsip digital terbaik yang pernah kami gunakan.'],
            ];
            @endphp
            @foreach($testi as $t)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 card-hover">
                <div class="flex gap-1 mb-4">
                    @for($i=0;$i<5;$i++)
                    <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-5 italic">"{{ $t['text'] }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-50">
                    <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-xs font-bold text-brand-700">{{ $t['av'] }}</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">{{ $t['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ $t['role'] }} · {{ $t['co'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ====== CTA ====== --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="gradient-hero rounded-3xl p-12 lg:p-16 text-center relative overflow-hidden">
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/5 rounded-full"></div>
            </div>
            <div class="relative">
                <h2 class="text-3xl lg:text-4xl font-black text-white mb-4">Siap Digitalisasi Arsip Bisnis Anda?</h2>
                <p class="text-indigo-100 text-lg mb-8 max-w-xl mx-auto">Bergabung dengan 12.500+ pengguna. Mulai gratis hari ini, tidak perlu kartu kredit.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('register') }}"
                       class="flex items-center gap-2 bg-white text-brand-700 font-black px-8 py-4 rounded-2xl hover:bg-indigo-50 transition-all shadow-xl w-full sm:w-auto justify-center">
                        Mulai Gratis Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <a href="{{ route('login') }}"
                       class="text-indigo-100 hover:text-white text-sm font-medium transition-colors">
                        Sudah punya akun? Masuk →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ====== FOOTER ====== --}}
<footer class="bg-gray-900 text-gray-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid md:grid-cols-4 gap-10 mb-10">
            <div class="md:col-span-1">
                <div class="flex items-center gap-2.5 mb-4">
                    <div class="w-9 h-9 bg-brand-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/></svg>
                    </div>
                    <span class="text-xl font-bold text-white">Profit<span class="text-brand-400">SaaS</span></span>
                </div>
                <p class="text-sm leading-relaxed mb-5">Platform manajemen arsip digital terpercaya untuk bisnis Indonesia modern.</p>
                <div class="flex gap-2">
                    @foreach(['twitter','linkedin'] as $social)
                    <a href="#" class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-brand-600 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            @if($social==='twitter')
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            @else
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            @endif
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            @foreach(['Produk'=>['Fitur','Keamanan','Harga','Changelog','Status'],'Perusahaan'=>['Tentang Kami','Blog','Karir','Press','Kontak'],'Legal'=>['Kebijakan Privasi','Syarat & Ketentuan','Cookie Policy','SLA','GDPR']] as $cat=>$links)
            <div>
                <h4 class="text-white font-bold mb-4">{{ $cat }}</h4>
                <ul class="space-y-2">
                    @foreach($links as $link)
                    <li><a href="#" class="text-sm hover:text-white transition-colors">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm">&copy; {{ date('Y') }} Profit SaaS. Semua hak cipta dilindungi.</p>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm text-green-400">Semua sistem berjalan normal</span>
            </div>
        </div>
    </div>
</footer>

@endsection

@section('scripts')
<script>
    const navbar = document.getElementById('navbar');
    const links = navbar.querySelectorAll('a[class*="text-white/80"]');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 60) {
            navbar.classList.add('nav-scrolled');
            navbar.style.background = 'rgba(255,255,255,0.95)';
            navbar.querySelectorAll('.text-white').forEach(el => el.classList.replace('text-white','text-gray-900'));
            navbar.querySelectorAll('.text-white\\/80').forEach(el => el.classList.replace('text-white/80','text-gray-600'));
            navbar.querySelectorAll('.text-white\\/90').forEach(el => el.classList.replace('text-white/90','text-gray-700'));
        } else {
            navbar.classList.remove('nav-scrolled');
            navbar.style.background = '';
        }
    });

    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) { e.preventDefault(); target.scrollIntoView({behavior:'smooth'}); }
        });
    });
</script>
@endsection
