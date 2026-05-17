@extends('layouts.app')
@section('title','Log Aktivitas — Profit SaaS')
@section('page-title','Log Aktivitas')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<a href="{{ route('admin.index') }}" class="hover:text-gray-700">Panel Admin</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Log Aktivitas</span>
@endsection

@section('page-content')

@php
$logs = [
    ['Ahmad Fauzi','Admin','Upload','Laporan Keuangan Q4.pdf','192.168.1.10','17 Mei 2026, 09:42','success'],
    ['Sari Dewi','Viewer','Download','Kontrak Kerja Ahmad.docx','192.168.1.25','17 Mei 2026, 09:31','info'],
    ['Budi Santoso','Admin','Hapus','Draft Proposal lama.pdf','192.168.1.8','17 Mei 2026, 09:15','danger'],
    ['Super Admin','Super Admin','Buat User','rini@company.id','192.168.1.1','17 Mei 2026, 08:55','warning'],
    ['Rini Wulandari','Viewer','Login','Login berhasil','192.168.1.30','17 Mei 2026, 08:30','success'],
    ['Dian Pratama','Viewer','Gagal Login','Password salah (3x)','192.168.1.15','17 Mei 2026, 08:10','danger'],
    ['Ahmad Fauzi','Admin','Share','Rekap Absensi.xlsx dibagikan','192.168.1.10','16 Mei 2026, 17:22','info'],
    ['Super Admin','Super Admin','Ubah Role','budi@company.id → Admin','192.168.1.1','16 Mei 2026, 15:40','warning'],
    ['Eko Cahyono','Admin','Upload','Foto Kantor 2024.zip','192.168.1.45','16 Mei 2026, 14:05','success'],
    ['Fitri Handayani','Viewer','Download','Annual Report 2023.pdf','192.168.1.52','16 Mei 2026, 11:30','info'],
    ['Budi Santoso','Admin','Edit','Kontrak Vendor.docx','192.168.1.8','16 Mei 2026, 10:15','info'],
    ['Sari Dewi','Viewer','Logout','Sesi berakhir','192.168.1.25','15 Mei 2026, 18:00','success'],
];
$tc = ['success'=>'green','info'=>'blue','danger'=>'red','warning'=>'orange'];
$actionIcon = [
    'Upload'=>'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12',
    'Download'=>'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4',
    'Hapus'=>'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16',
    'Buat User'=>'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z',
    'Login'=>'M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1',
    'Gagal Login'=>'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
    'Share'=>'M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z',
    'Ubah Role'=>'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
    'Edit'=>'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
    'Logout'=>'M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1',
];
@endphp

{{-- Filters --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-3 flex-wrap">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Cari aktivitas..." class="pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500 w-56">
        </div>
        <select class="px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option>Semua Aksi</option>
            <option>Upload</option>
            <option>Download</option>
            <option>Hapus</option>
            <option>Login</option>
            <option>Share</option>
        </select>
        <select class="px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option>7 Hari Terakhir</option>
            <option>30 Hari Terakhir</option>
            <option>Hari Ini</option>
            <option>Bulan Ini</option>
        </select>
    </div>
    <button class="flex items-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Export CSV
    </button>
</div>

{{-- Stats row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([['4.832','Total Log','brand'],['312','Upload','green'],['589','Download','blue'],['28','Aksi Hapus','red']] as [$val,$label,$c])
    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm">
        <p class="text-2xl font-black text-gray-900">{{ $val }}</p>
        <p class="text-xs text-gray-500 mt-0.5">{{ $label }}</p>
        <div class="w-full bg-gray-100 rounded-full h-1 mt-3">
            <div class="bg-{{ $c }}-500 h-1 rounded-full" style="width:{{ rand(30,85) }}%"></div>
        </div>
    </div>
    @endforeach
</div>

{{-- Log table --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h3 class="font-bold text-gray-900">Riwayat Aktivitas</h3>
        <span class="text-xs text-gray-400">4.832 entri ditemukan</span>
    </div>
    <div class="divide-y divide-gray-50">
        @foreach($logs as [$user,$role,$action,$target,$ip,$time,$type])
        @php
            $c = $tc[$type];
            $icon = $actionIcon[$action] ?? 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2';
        @endphp
        <div class="flex items-start gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors">
            <div class="w-9 h-9 bg-{{ $c }}-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-{{ $c }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="text-sm font-semibold text-gray-900">{{ $user }}</span>
                    <span class="px-1.5 py-0.5 text-xs bg-gray-100 text-gray-600 rounded-full">{{ $role }}</span>
                    <span class="px-2 py-0.5 text-xs font-bold bg-{{ $c }}-50 text-{{ $c }}-700 rounded-full">{{ $action }}</span>
                </div>
                <p class="text-sm text-gray-500 mt-0.5 truncate">{{ $target }}</p>
                <div class="flex items-center gap-3 mt-1.5">
                    <span class="flex items-center gap-1 text-xs text-gray-400">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $time }}
                    </span>
                    <span class="flex items-center gap-1 text-xs font-mono text-gray-400">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
                        {{ $ip }}
                    </span>
                </div>
            </div>
            <div class="flex-shrink-0">
                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs rounded-lg
                    {{ $type==='success'?'bg-green-50 text-green-700':($type==='danger'?'bg-red-50 text-red-700':($type==='warning'?'bg-orange-50 text-orange-700':'bg-blue-50 text-blue-700')) }}">
                    @if($type==='success') ✓ Berhasil
                    @elseif($type==='danger') ✕ Gagal
                    @elseif($type==='warning') ⚠ Perhatian
                    @else ℹ Info @endif
                </span>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100">
        <p class="text-sm text-gray-500">Halaman 1 dari 403</p>
        <div class="flex items-center gap-1">
            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-400" disabled>← Sebelumnya</button>
            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600">Berikutnya →</button>
        </div>
    </div>
</div>

@endsection
