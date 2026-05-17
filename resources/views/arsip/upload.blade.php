@extends('layouts.app')
@section('title','Upload File — Profit SaaS')
@section('page-title','Upload File')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<a href="{{ route('arsip.index') }}" class="hover:text-gray-700">Arsip</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Upload</span>
@endsection

@section('page-content')

<div class="max-w-3xl mx-auto">

    {{-- Drop zone --}}
    <div id="dropzone"
         class="relative border-2 border-dashed border-brand-300 bg-brand-50/30 rounded-2xl p-12 text-center mb-6 transition-all"
         ondragover="event.preventDefault();this.classList.add('border-brand-500','bg-brand-50')"
         ondragleave="this.classList.remove('border-brand-500','bg-brand-50')"
         ondrop="event.preventDefault();this.classList.remove('border-brand-500','bg-brand-50');handleDrop(event)">
        <input type="file" id="file-input" multiple class="hidden" onchange="handleFiles(this.files)">
        <div class="w-16 h-16 bg-brand-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
        </div>
        <p class="text-lg font-bold text-gray-900 mb-1">Seret & lepas file di sini</p>
        <p class="text-sm text-gray-500 mb-5">atau pilih file dari perangkat Anda</p>
        <button onclick="document.getElementById('file-input').click()"
                class="px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-bold rounded-xl transition-all shadow-sm">
            Pilih File
        </button>
        <p class="text-xs text-gray-400 mt-4">Mendukung PDF, DOCX, XLSX, PPTX, JPG, PNG, ZIP · Maks. 100 MB per file</p>
    </div>

    {{-- Upload queue (demo) --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-6">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900">Antrian Upload</h3>
            <span class="text-xs text-gray-400" id="queue-count">3 file</span>
        </div>
        <div class="divide-y divide-gray-50" id="file-list">
            @foreach([
                ['Laporan Keuangan Q4 2024.pdf','2.4 MB','pdf','red',100,'done'],
                ['Foto Kantor Jakarta.zip','15.2 MB','zip','yellow',65,'uploading'],
                ['Rekap Absensi Desember.xlsx','1.1 MB','xls','green',0,'pending'],
            ] as [$name,$size,$ext,$color,$pct,$status])
            <div class="flex items-center gap-4 px-6 py-4">
                <div class="w-9 h-9 bg-{{ $color }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-xs font-black text-{{ $color }}-700 uppercase">{{ $ext }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-1.5">
                        <p class="text-sm font-semibold text-gray-900 truncate pr-4">{{ $name }}</p>
                        <span class="text-xs text-gray-400 flex-shrink-0">{{ $size }}</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="h-1.5 rounded-full transition-all
                            {{ $status==='done'?'bg-green-500':($status==='uploading'?'bg-brand-500':'bg-gray-200') }}"
                             style="width:{{ $pct }}%"></div>
                    </div>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-xs {{ $status==='done'?'text-green-600':($status==='uploading'?'text-brand-600':'text-gray-400') }} font-medium">
                            @if($status==='done') ✓ Selesai
                            @elseif($status==='uploading') Mengunggah {{ $pct }}%...
                            @else Menunggu... @endif
                        </span>
                        @if($status!=='done')
                        <button class="text-xs text-red-400 hover:text-red-600 font-medium">Batalkan</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Options --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
        <h3 class="font-bold text-gray-900 mb-4">Opsi Upload</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Simpan ke Folder</label>
                <select class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">/ (Root)</option>
                    <option>/ Keuangan</option>
                    <option>/ SDM</option>
                    <option>/ Legal & Kontrak</option>
                    <option>/ Proyek</option>
                    <option>/ Pemasaran</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Visibilitas</label>
                <div class="grid grid-cols-3 gap-3">
                    @foreach([['Privat','Hanya saya','gray'],['Tim','Semua anggota tim','blue'],['Publik','Siapa saja dengan link','green']] as [$vis,$desc,$c])
                    <label class="cursor-pointer">
                        <input type="radio" name="visibility" class="sr-only peer" {{ $loop->first?'checked':'' }}>
                        <div class="border-2 border-gray-200 rounded-xl p-3 peer-checked:border-brand-500 peer-checked:bg-brand-50 transition-all">
                            <p class="text-xs font-bold text-gray-800">{{ $vis }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Keterangan (opsional)</label>
                <textarea rows="3" placeholder="Tambahkan catatan atau deskripsi file..."
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none"></textarea>
            </div>
            <label class="flex items-center gap-2.5 cursor-pointer">
                <input type="checkbox" class="w-4 h-4 text-brand-600 border-gray-300 rounded focus:ring-brand-500">
                <span class="text-sm text-gray-600">Beri notifikasi ke anggota tim setelah upload selesai</span>
            </label>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('arsip.index') }}"
           class="flex-1 py-3 border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors text-center">
            Batal
        </a>
        <button class="flex-1 py-3 bg-brand-600 hover:bg-brand-700 text-white text-sm font-bold rounded-xl transition-all shadow-sm">
            Upload Semua
        </button>
    </div>

</div>

@endsection

@section('scripts')
<script>
function handleFiles(files) {
    console.log('Files selected:', files.length);
}
function handleDrop(e) {
    handleFiles(e.dataTransfer.files);
}
</script>
@endsection
