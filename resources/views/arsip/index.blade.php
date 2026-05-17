@extends('layouts.app')
@section('title','Arsip Saya — Profit SaaS')
@section('page-title','Arsip Saya')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Arsip Saya</span>
@endsection

@section('page-content')

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-5">
    <div class="flex items-center gap-2">
        <button class="flex items-center gap-1.5 text-sm font-semibold text-brand-600 bg-brand-50 hover:bg-brand-100 px-3 py-1.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/></svg>
            Semua File
        </button>
        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-sm text-gray-700 font-medium">Dokumen 2024</span>
    </div>
    <div class="flex items-center gap-2">
        {{-- View toggle --}}
        <div class="flex bg-gray-100 rounded-lg p-0.5">
            <button id="btn-grid" onclick="setView('grid')" class="p-1.5 rounded-md bg-white shadow-sm text-brand-600 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            </button>
            <button id="btn-list" onclick="setView('list')" class="p-1.5 rounded-md text-gray-400 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            </button>
        </div>
        <select class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option>Semua jenis</option>
            <option>Dokumen</option>
            <option>Gambar</option>
            <option>Spreadsheet</option>
            <option>Arsip ZIP</option>
        </select>
        <select class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option>Terbaru</option>
            <option>Nama A–Z</option>
            <option>Ukuran ↑</option>
        </select>
        <button onclick="document.getElementById('modal-folder').classList.remove('hidden')"
                class="flex items-center gap-1.5 text-sm font-medium text-gray-600 border border-gray-200 hover:bg-gray-50 px-3 py-2 rounded-xl transition-all bg-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h4a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
            Folder Baru
        </button>
    </div>
</div>

{{-- Drop zone --}}
<div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 mb-5 text-center hover:border-brand-300 hover:bg-brand-50/20 transition-all cursor-pointer group"
     onclick="document.getElementById('file-inp').click()"
     ondragover="this.classList.add('border-brand-400','bg-brand-50/40');event.preventDefault()"
     ondragleave="this.classList.remove('border-brand-400','bg-brand-50/40')">
    <input type="file" id="file-inp" multiple class="hidden">
    <div class="w-12 h-12 bg-gray-100 group-hover:bg-brand-100 rounded-2xl flex items-center justify-center mx-auto mb-3 transition-colors">
        <svg class="w-6 h-6 text-gray-400 group-hover:text-brand-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
    </div>
    <p class="text-sm font-semibold text-gray-600 group-hover:text-brand-700 transition-colors">Drag & drop file ke sini atau <span class="text-brand-600 underline">pilih file</span></p>
    <p class="text-xs text-gray-400 mt-1">PDF, DOC, XLS, PPT, JPG, ZIP · Maks. 2 GB</p>
</div>

{{-- Folders --}}
<div class="mb-6">
    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Folder</h3>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
        @php
        $folders=[['Keuangan 2024',24,'blue'],['SDM & HRD',18,'green'],['Legal & Kontrak',31,'red'],['Pemasaran',12,'purple'],['Operasional',8,'orange'],['Arsip Lama',56,'gray']];
        @endphp
        @foreach($folders as [$name,$count,$c])
        <div class="group bg-white border border-gray-100 rounded-2xl p-4 hover:border-{{ $c }}-200 hover:shadow-md transition-all cursor-pointer">
            <div class="w-10 h-10 bg-{{ $c }}-100 group-hover:bg-{{ $c }}-200 rounded-xl flex items-center justify-center mb-3 transition-colors">
                <svg class="w-5 h-5 text-{{ $c }}-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/></svg>
            </div>
            <p class="text-sm font-semibold text-gray-800 truncate">{{ $name }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $count }} file</p>
        </div>
        @endforeach
        <button onclick="document.getElementById('modal-folder').classList.remove('hidden')"
                class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-4 hover:border-brand-300 hover:bg-brand-50/30 transition-all text-center group">
            <div class="w-10 h-10 bg-gray-100 group-hover:bg-brand-100 rounded-xl flex items-center justify-center mb-3 mx-auto transition-colors">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-brand-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <p class="text-xs text-gray-400 group-hover:text-brand-600 font-semibold transition-colors">Folder Baru</p>
        </button>
    </div>
</div>

{{-- Files --}}
<div>
    <div class="flex items-center justify-between mb-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">File</h3>
        <span class="text-xs text-gray-400">128 file</span>
    </div>

    @php
    $files=[
        ['name'=>'Laporan Keuangan Q4 2024.pdf','ext'=>'pdf','size'=>'2.4 MB','date'=>'5 Jan','color'=>'red','star'=>true],
        ['name'=>'Kontrak Karyawan Baru.docx','ext'=>'doc','size'=>'845 KB','date'=>'4 Jan','color'=>'blue','star'=>false],
        ['name'=>'Data Penjualan 2024.xlsx','ext'=>'xls','size'=>'1.8 MB','date'=>'3 Jan','color'=>'green','star'=>true],
        ['name'=>'Presentasi Investor.pptx','ext'=>'ppt','size'=>'8.2 MB','date'=>'2 Jan','color'=>'orange','star'=>false],
        ['name'=>'Foto Tim 2024.zip','ext'=>'zip','size'=>'245 MB','date'=>'1 Jan','color'=>'yellow','star'=>false],
        ['name'=>'SOP Operasional.pdf','ext'=>'pdf','size'=>'3.1 MB','date'=>'30 Des','color'=>'red','star'=>false],
        ['name'=>'Logo Perusahaan.png','ext'=>'img','size'=>'523 KB','date'=>'28 Des','color'=>'purple','star'=>true],
        ['name'=>'Rekap Absensi.xlsx','ext'=>'xls','size'=>'1.1 MB','date'=>'27 Des','color'=>'green','star'=>false],
        ['name'=>'PKS Vendor 2025.pdf','ext'=>'pdf','size'=>'4.5 MB','date'=>'25 Des','color'=>'red','star'=>false],
        ['name'=>'Video Profil.mp4','ext'=>'vid','size'=>'128 MB','date'=>'23 Des','color'=>'pink','star'=>false],
        ['name'=>'Meeting Notes Q4.docx','ext'=>'doc','size'=>'312 KB','date'=>'20 Des','color'=>'blue','star'=>false],
        ['name'=>'Budget Plan 2025.xlsx','ext'=>'xls','size'=>'2.3 MB','date'=>'18 Des','color'=>'green','star'=>true],
    ];
    @endphp

    {{-- Grid view --}}
    <div id="view-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
        @foreach($files as $f)
        <div class="group bg-white border border-gray-100 rounded-2xl p-4 hover:border-brand-200 hover:shadow-md transition-all cursor-pointer relative">
            <button class="absolute top-2.5 right-2.5 {{ $f['star']?'':'opacity-0 group-hover:opacity-100' }} transition-opacity">
                <svg class="w-3.5 h-3.5 {{ $f['star']?'text-amber-400 fill-amber-400':'text-gray-300 hover:text-amber-400' }}" fill="{{ $f['star']?'currentColor':'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </button>
            <div class="w-12 h-12 bg-{{ $f['color'] }}-100 rounded-xl flex items-center justify-center mb-3 mx-auto">
                <span class="text-xs font-black text-{{ $f['color'] }}-700 uppercase">{{ $f['ext'] }}</span>
            </div>
            <p class="text-xs font-semibold text-gray-800 text-center truncate">{{ $f['name'] }}</p>
            <p class="text-xs text-gray-400 text-center mt-0.5">{{ $f['size'] }}</p>
            <div class="absolute inset-x-0 bottom-0 flex justify-center gap-1 pb-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="p-1 bg-white rounded-lg shadow-sm border border-gray-100 text-gray-400 hover:text-brand-600 transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg></button>
                <button class="p-1 bg-white rounded-lg shadow-sm border border-gray-100 text-gray-400 hover:text-brand-600 transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg></button>
                <button class="p-1 bg-white rounded-lg shadow-sm border border-gray-100 text-gray-400 hover:text-red-600 transition-colors"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
        </div>
        @endforeach
    </div>

    {{-- List view --}}
    <div id="view-list" class="hidden bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50/50">
                    <th class="text-left px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wide">Nama</th>
                    <th class="text-left px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wide hidden md:table-cell">Jenis</th>
                    <th class="text-left px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wide hidden sm:table-cell">Ukuran</th>
                    <th class="text-left px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wide hidden lg:table-cell">Diubah</th>
                    <th class="text-right px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($files as $f)
                <tr class="hover:bg-gray-50/50 transition-colors group cursor-pointer">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-{{ $f['color'] }}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-black text-{{ $f['color'] }}-700 uppercase">{{ $f['ext'] }}</span>
                            </div>
                            <span class="font-semibold text-gray-800 truncate max-w-xs">{{ $f['name'] }}</span>
                            @if($f['star'])<svg class="w-3 h-3 text-amber-400 fill-amber-400 flex-shrink-0 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endif
                        </div>
                    </td>
                    <td class="px-4 py-3 hidden md:table-cell"><span class="px-2 py-0.5 bg-{{ $f['color'] }}-50 text-{{ $f['color'] }}-700 text-xs font-bold rounded-full uppercase">{{ $f['ext'] }}</span></td>
                    <td class="px-4 py-3 text-gray-500 text-xs hidden sm:table-cell">{{ $f['size'] }}</td>
                    <td class="px-4 py-3 text-gray-400 text-xs hidden lg:table-cell">{{ $f['date'] }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-brand-600 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg></button>
                            <button class="p-1.5 rounded-lg hover:bg-red-50 text-gray-400 hover:text-red-600 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex items-center justify-between px-4 py-3 border-t border-gray-100">
            <p class="text-xs text-gray-500">1–12 dari 128 file</p>
            <div class="flex items-center gap-1">
                @for($i=1;$i<=5;$i++)
                <button class="w-7 h-7 rounded-lg text-xs font-semibold {{ $i===1?'bg-brand-600 text-white':'hover:bg-gray-100 text-gray-600' }} transition-colors">{{ $i }}</button>
                @endfor
            </div>
        </div>
    </div>
</div>

{{-- New folder modal --}}
<div id="modal-folder" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="document.getElementById('modal-folder').classList.add('hidden')"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl p-6 w-full max-w-sm mx-4">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Buat Folder Baru</h3>
        <input type="text" placeholder="Nama folder..." autofocus
               class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 mb-4">
        <div class="flex gap-3">
            <button onclick="document.getElementById('modal-folder').classList.add('hidden')"
                    class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all text-sm">Batal</button>
            <button class="flex-1 py-2.5 bg-brand-600 text-white font-bold rounded-xl hover:bg-brand-700 transition-all text-sm">Buat</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function setView(t) {
    const g=document.getElementById('view-grid'), l=document.getElementById('view-list');
    const bg=document.getElementById('btn-grid'), bl=document.getElementById('btn-list');
    if(t==='grid'){g.classList.remove('hidden');l.classList.add('hidden');bg.className='p-1.5 rounded-md bg-white shadow-sm text-brand-600 transition-all';bl.className='p-1.5 rounded-md text-gray-400 transition-all';}
    else{l.classList.remove('hidden');g.classList.add('hidden');bl.className='p-1.5 rounded-md bg-white shadow-sm text-brand-600 transition-all';bg.className='p-1.5 rounded-md text-gray-400 transition-all';}
}
</script>
@endsection
