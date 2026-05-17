@extends('layouts.app')
@section('title','Panel Admin — Profit SaaS')
@section('page-title','Panel Admin')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Panel Admin</span>
@endsection

@section('page-content')

<div class="flex items-center gap-2 mb-6">
    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-brand-600 text-white text-xs font-bold rounded-full">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        Super Admin
    </span>
    <span class="text-sm text-gray-500">Akses penuh ke seluruh fitur sistem</span>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([['Total Pengguna','87','12 baru bulan ini','brand','M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],['Aktif Hari Ini','64','Online sekarang','green','M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z'],['Total Storage','89.4 GB','dari 500 GB','blue','M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],['Log Aktivitas','4.832','bulan ini','purple','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2']] as [$label,$val,$sub,$c,$icon])
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
        <div class="w-10 h-10 bg-{{ $c }}-100 rounded-xl flex items-center justify-center mb-3">
            <svg class="w-5 h-5 text-{{ $c }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
        </div>
        <p class="text-2xl font-black text-gray-900">{{ $val }}</p>
        <p class="text-xs font-semibold text-gray-700 mt-0.5">{{ $label }}</p>
        <p class="text-xs text-gray-400 mt-0.5">{{ $sub }}</p>
    </div>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-6">
    {{-- Role distribution --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-5">
            <h3 class="font-bold text-gray-900">Pengguna per Role</h3>
            <a href="{{ route('admin.users') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">Kelola →</a>
        </div>
        <div class="space-y-4">
            @foreach([['Super Admin',2,87,'brand-600','Akses penuh ke sistem'],['Admin',15,87,'blue-600','Kelola arsip & pengguna'],['Viewer',70,87,'green-600','Hanya dapat melihat']] as [$role,$n,$total,$bg,$desc])
            <div class="flex items-center gap-4">
                <div class="w-9 h-9 bg-{{ str_replace('-600','',$bg) }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-{{ $bg }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between text-sm mb-1"><span class="font-semibold text-gray-800">{{ $role }}</span><span class="font-black text-gray-900">{{ $n }}</span></div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="bg-{{ $bg }} h-1.5 rounded-full" style="width:{{ ($n/$total)*100 }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Quick actions --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <h3 class="font-bold text-gray-900 mb-5">Tindakan Cepat</h3>
        <div class="grid grid-cols-2 gap-3">
            @foreach([[route('admin.users'),'Tambah Pengguna','brand','M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],[route('admin.log'),'Lihat Log','blue','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],['#','Kelola Storage','green','M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],['#','Backup Data','orange','M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4'],['#','Pengaturan','gray','M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],['#','Laporan','purple','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z']] as [$url,$label,$c,$icon])
            <a href="{{ $url }}"
               class="flex items-center gap-3 p-3 border border-gray-100 rounded-xl hover:border-{{ $c }}-200 hover:bg-{{ $c }}-50/50 transition-all group">
                <div class="w-9 h-9 bg-{{ $c }}-100 rounded-lg flex items-center justify-center group-hover:bg-{{ $c }}-200 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 text-{{ $c }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 group-hover:text-gray-900">{{ $label }}</span>
            </a>
            @endforeach
        </div>
    </div>

    {{-- Recent logs --}}
    <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
            <h3 class="font-bold text-gray-900">Aktivitas Sistem Terbaru</h3>
            <a href="{{ route('admin.log') }}" class="text-sm text-brand-600 font-semibold hover:text-brand-700 transition-colors">Lihat semua →</a>
        </div>
        <div class="divide-y divide-gray-50">
            @php
            $logs=[
                ['Ahmad Fauzi','Admin','Upload','Laporan Q4.pdf','192.168.1.10','09:42','success'],
                ['Sari Dewi','Viewer','Download','Kontrak.docx','192.168.1.25','09:31','info'],
                ['Budi Santoso','Admin','Hapus','Draft lama.pdf','192.168.1.8','09:15','danger'],
                ['Super Admin','Super Admin','Buat User','rini@company.id','192.168.1.1','08:55','warning'],
                ['Rini Wulandari','Viewer','Login','Login berhasil','192.168.1.30','08:30','success'],
            ];
            $tc=['success'=>'green','info'=>'blue','danger'=>'red','warning'=>'orange'];
            @endphp
            @foreach($logs as [$user,$role,$action,$target,$ip,$time,$type])
            @php $c=$tc[$type]; @endphp
            <div class="flex items-center gap-4 px-6 py-3.5 hover:bg-gray-50/50 transition-colors">
                <div class="w-8 h-8 bg-{{ $c }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-xs font-black text-{{ $c }}-700">{{ substr($user,0,1) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-sm font-semibold text-gray-900">{{ $user }}</span>
                        <span class="px-1.5 py-0.5 text-xs bg-gray-100 text-gray-600 rounded-full">{{ $role }}</span>
                        <span class="px-1.5 py-0.5 text-xs bg-{{ $c }}-50 text-{{ $c }}-700 rounded-full font-semibold">{{ $action }}</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5 truncate">{{ $target }}</p>
                </div>
                <div class="text-right flex-shrink-0">
                    <p class="text-xs font-semibold text-gray-700">{{ $time }}</p>
                    <p class="text-xs font-mono text-gray-400">{{ $ip }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
