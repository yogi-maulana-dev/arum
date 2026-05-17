@extends('layouts.app')
@section('title','Berbintang — Profit SaaS')
@section('page-title','Berbintang')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Berbintang</span>
@endsection

@section('page-content')

@php
$starred = [
    ['Laporan Keuangan Q4 2024.pdf','pdf','red','2.4 MB','Keuangan','2 hari lalu','Dibintangi 1 minggu lalu'],
    ['Kontrak Kerja — Ahmad Fauzi.docx','doc','blue','845 KB','SDM','1 jam lalu','Dibintangi 2 minggu lalu'],
    ['Annual Report 2023.pdf','pdf','red','8.7 MB','Root','3 hari lalu','Dibintangi 1 bulan lalu'],
    ['Rekap Absensi Desember.xlsx','xls','green','1.1 MB','SDM','Kemarin','Dibintangi 2 hari lalu'],
    ['Panduan SOP Perusahaan.pdf','pdf','red','3.2 MB','Root','5 hari lalu','Dibintangi 3 hari lalu'],
    ['Template Surat Resmi.docx','doc','blue','420 KB','Legal','1 minggu lalu','Dibintangi 1 minggu lalu'],
];
@endphp

@if(count($starred) > 0)

{{-- Sort bar --}}
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ count($starred) }} file berbintang</p>
    <div class="flex items-center gap-2">
        <span class="text-sm text-gray-500">Urutkan:</span>
        <select class="px-3 py-2 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option>Terbaru Dibintangi</option>
            <option>Nama A–Z</option>
            <option>Ukuran Terbesar</option>
            <option>Terakhir Diubah</option>
        </select>
    </div>
</div>

{{-- Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach($starred as $i => [$name,$ext,$color,$size,$folder,$modified,$starred_at])
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 group hover:shadow-md transition-all relative cursor-pointer">

        {{-- Star button --}}
        <button class="absolute top-3 right-3 text-yellow-400 hover:text-yellow-300 transition-colors z-10" title="Hapus bintang">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
        </button>

        {{-- File icon --}}
        <div class="w-12 h-12 bg-{{ $color }}-100 rounded-xl flex items-center justify-center mb-3">
            <span class="text-sm font-black text-{{ $color }}-700 uppercase">{{ $ext }}</span>
        </div>

        <p class="text-sm font-semibold text-gray-900 truncate pr-5 mb-1">{{ $name }}</p>
        <div class="flex items-center gap-2 mb-2">
            <span class="text-xs text-gray-400">{{ $size }}</span>
            <span class="text-gray-200">•</span>
            <span class="text-xs text-gray-400">{{ $folder }}</span>
        </div>
        <p class="text-xs text-gray-300">{{ $starred_at }}</p>

        {{-- Hover actions --}}
        <div class="absolute inset-x-0 bottom-0 p-3 flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity bg-gradient-to-t from-white via-white/90 to-transparent rounded-b-2xl">
            <button class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-brand-600 transition-colors" title="Download">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </button>
            <button class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors" title="Lainnya">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
            </button>
        </div>
    </div>
    @endforeach
</div>

@else

{{-- Empty state --}}
<div class="flex flex-col items-center justify-center py-24 text-center">
    <div class="w-20 h-20 bg-yellow-50 rounded-2xl flex items-center justify-center mb-5">
        <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
        </svg>
    </div>
    <h3 class="text-lg font-bold text-gray-900 mb-1">Belum ada file berbintang</h3>
    <p class="text-sm text-gray-500 max-w-sm">Tandai file penting dengan bintang untuk akses cepat dari sini.</p>
    <a href="{{ route('arsip.index') }}" class="mt-6 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl transition-all shadow-sm">
        Jelajahi Arsip
    </a>
</div>

@endif

@endsection
