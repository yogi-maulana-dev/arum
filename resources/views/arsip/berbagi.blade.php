@extends('layouts.app')
@section('title','Dibagikan — Profit SaaS')
@section('page-title','Dibagikan')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Dibagikan</span>
@endsection

@section('page-content')

@php
$sharedByMe = [
    ['Laporan Keuangan Q4.pdf','pdf','red','2.4 MB','Ahmad F., Sari D.','Akses Baca','Berakhir 31 Des 2026','5 hari lalu'],
    ['Foto Kantor Jakarta.zip','zip','yellow','15.2 MB','Tim Pemasaran','Akses Penuh','Tidak terbatas','2 minggu lalu'],
    ['Rekap Absensi.xlsx','xls','green','1.1 MB','Budi S.','Akses Baca','Berakhir 30 Jun 2026','1 bulan lalu'],
];
$sharedWithMe = [
    ['Annual Report 2023.pdf','pdf','red','8.7 MB','Super Admin','Akses Baca','3 jam lalu'],
    ['Panduan SOP.docx','doc','blue','1.2 MB','Ahmad Fauzi','Akses Penuh','Kemarin'],
    ['Template Proposal.pptx','ppt','orange','4.5 MB','Sari Dewi','Akses Baca','3 hari lalu'],
    ['Database Klien.xlsx','xls','green','2.8 MB','Eko Cahyono','Akses Baca','1 minggu lalu'],
];
@endphp

{{-- Tabs --}}
<div class="flex gap-1 p-1 bg-gray-100 rounded-xl mb-6 w-fit">
    @foreach([['tab-byme','Saya Bagikan','3'],['tab-withme','Dibagikan ke Saya','4']] as [$id,$label,$count])
    <button onclick="switchTab('{{ $id }}')" id="btn-{{ $id }}"
            class="flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg transition-all {{ $loop->first?'bg-white text-gray-900 shadow-sm':'text-gray-500 hover:text-gray-700' }}">
        {{ $label }}
        <span class="text-xs px-1.5 py-0.5 bg-gray-200 text-gray-600 rounded-full">{{ $count }}</span>
    </button>
    @endforeach
</div>

{{-- Tab: Shared by me --}}
<div id="tab-byme">
    <div class="flex items-center justify-between mb-4">
        <p class="text-sm text-gray-500">File yang Anda bagikan ke orang lain</p>
        <button class="flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
            Bagikan File Baru
        </button>
    </div>
    <div class="space-y-3">
        @foreach($sharedByMe as [$name,$ext,$color,$size,$to,$access,$expires,$shared])
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex items-center gap-4 group hover:shadow-md transition-shadow">
            <div class="w-11 h-11 bg-{{ $color }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-black text-{{ $color }}-700 uppercase">{{ $ext }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900">{{ $name }}</p>
                <div class="flex items-center gap-3 mt-1 flex-wrap">
                    <span class="text-xs text-gray-400">{{ $size }}</span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs text-gray-500">Ke: <span class="font-medium text-gray-700">{{ $to }}</span></span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs px-2 py-0.5 bg-blue-50 text-blue-700 rounded-full font-medium">{{ $access }}</span>
                </div>
                <div class="flex items-center gap-3 mt-1.5">
                    <span class="text-xs text-gray-400">{{ $expires }}</span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs text-gray-400">Dibagikan {{ $shared }}</span>
                </div>
            </div>
            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="p-2 rounded-xl hover:bg-blue-50 text-gray-400 hover:text-blue-600 transition-colors" title="Edit akses">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </button>
                <button class="p-2 rounded-xl hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors" title="Cabut akses">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Tab: Shared with me --}}
<div id="tab-withme" class="hidden">
    <p class="text-sm text-gray-500 mb-4">File yang dibagikan orang lain kepada Anda</p>
    <div class="space-y-3">
        @foreach($sharedWithMe as [$name,$ext,$color,$size,$from,$access,$when])
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex items-center gap-4 group hover:shadow-md transition-shadow">
            <div class="w-11 h-11 bg-{{ $color }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-black text-{{ $color }}-700 uppercase">{{ $ext }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900">{{ $name }}</p>
                <div class="flex items-center gap-3 mt-1 flex-wrap">
                    <span class="text-xs text-gray-400">{{ $size }}</span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs text-gray-500">Dari: <span class="font-medium text-gray-700">{{ $from }}</span></span>
                    <span class="text-gray-200">•</span>
                    <span class="text-xs px-2 py-0.5 bg-green-50 text-green-700 rounded-full font-medium">{{ $access }}</span>
                </div>
                <p class="text-xs text-gray-400 mt-1">{{ $when }}</p>
            </div>
            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="p-2 rounded-xl hover:bg-gray-100 text-gray-400 hover:text-brand-600 transition-colors" title="Download">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </button>
                <button class="p-2 rounded-xl hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors" title="Lainnya">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('scripts')
<script>
function switchTab(tab) {
    ['tab-byme','tab-withme'].forEach(id => {
        document.getElementById(id).classList.toggle('hidden', id !== tab);
        document.getElementById('btn-' + id).className = id === tab
            ? 'flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg transition-all bg-white text-gray-900 shadow-sm'
            : 'flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg transition-all text-gray-500 hover:text-gray-700';
    });
}
</script>
@endsection
