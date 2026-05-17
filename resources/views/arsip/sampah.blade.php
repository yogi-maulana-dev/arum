@extends('layouts.app')
@section('title','Sampah — Profit SaaS')
@section('page-title','Sampah')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Sampah</span>
@endsection

@section('page-content')

@php
$trashed = [
    ['Draft Proposal Lama.pdf','pdf','red','1.8 MB','Keuangan','Budi Santoso','3 hari lalu','27 hari lagi'],
    ['Foto Acara Lama.zip','zip','yellow','42.1 MB','Pemasaran','Ahmad Fauzi','5 hari lalu','25 hari lagi'],
    ['Rekap Versi Awal.xlsx','xls','green','780 KB','SDM','Super Admin','1 minggu lalu','23 hari lagi'],
    ['Kontrak Batal.docx','doc','blue','612 KB','Legal','Sari Dewi','10 hari lalu','20 hari lagi'],
    ['Presentasi v1.pptx','ppt','orange','5.3 MB','Pemasaran','Eko Cahyono','12 hari lalu','18 hari lagi'],
];
@endphp

{{-- Warning banner --}}
<div class="flex items-start gap-3 bg-orange-50 border border-orange-200 rounded-2xl p-4 mb-6">
    <svg class="w-5 h-5 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
    <div>
        <p class="text-sm font-semibold text-orange-800">File dihapus permanen setelah 30 hari</p>
        <p class="text-xs text-orange-600 mt-0.5">File di sampah masih dapat dipulihkan sebelum batas waktu berlalu. Setelah 30 hari, file akan terhapus secara permanen dan tidak dapat dipulihkan.</p>
    </div>
</div>

@if(count($trashed) > 0)

{{-- Action bar --}}
<div class="flex items-center justify-between mb-5">
    <div class="flex items-center gap-3">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="select-all" onchange="toggleAll(this)" class="w-4 h-4 text-brand-600 border-gray-300 rounded focus:ring-brand-500">
            <span class="text-sm font-medium text-gray-600">Pilih semua</span>
        </label>
        <span class="text-xs text-gray-400">{{ count($trashed) }} file</span>
    </div>
    <div class="flex items-center gap-2">
        <button class="flex items-center gap-2 px-3 py-2 border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Pulihkan Dipilih
        </button>
        <button onclick="if(confirm('Hapus semua file secara permanen? Tindakan ini tidak dapat dibatalkan.')) alert('Demo: File dihapus')"
                class="flex items-center gap-2 px-3 py-2 bg-red-50 border border-red-200 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-100 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Kosongkan Sampah
        </button>
    </div>
</div>

{{-- List --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="divide-y divide-gray-50">
        @foreach($trashed as $i => [$name,$ext,$color,$size,$folder,$deletedBy,$deletedAt,$expiresIn])
        <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors group">
            <input type="checkbox" class="file-check w-4 h-4 text-brand-600 border-gray-300 rounded focus:ring-brand-500 flex-shrink-0">
            <div class="w-10 h-10 bg-{{ $color }}-100 rounded-xl flex items-center justify-center flex-shrink-0 opacity-60">
                <span class="text-xs font-black text-{{ $color }}-700 uppercase">{{ $ext }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-700 truncate">{{ $name }}</p>
                <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                    <span class="text-xs text-gray-400">{{ $size }}</span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs text-gray-400">{{ $folder }}</span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs text-gray-400">Dihapus oleh <span class="font-medium text-gray-500">{{ $deletedBy }}</span></span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs text-gray-400">{{ $deletedAt }}</span>
                </div>
            </div>
            <div class="flex-shrink-0 text-right hidden sm:block">
                <span class="text-xs px-2 py-1 bg-orange-50 text-orange-600 rounded-lg font-medium">Hapus dalam {{ $expiresIn }}</span>
            </div>
            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="p-1.5 rounded-lg hover:bg-green-50 text-gray-400 hover:text-green-600 transition-colors" title="Pulihkan">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
                <button onclick="if(confirm('Hapus permanen file ini?')) alert('Demo: File dihapus permanen')"
                        class="p-1.5 rounded-lg hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors" title="Hapus permanen">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

@else

{{-- Empty state --}}
<div class="flex flex-col items-center justify-center py-24 text-center">
    <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mb-5">
        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
    </div>
    <h3 class="text-lg font-bold text-gray-900 mb-1">Sampah kosong</h3>
    <p class="text-sm text-gray-500 max-w-sm">File yang Anda hapus akan muncul di sini selama 30 hari sebelum dihapus permanen.</p>
    <a href="{{ route('arsip.index') }}" class="mt-6 px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl transition-all shadow-sm">
        Kembali ke Arsip
    </a>
</div>

@endif

@endsection

@section('scripts')
<script>
function toggleAll(cb) {
    document.querySelectorAll('.file-check').forEach(c => c.checked = cb.checked);
}
</script>
@endsection
