@extends('layouts.app')
@section('title','Manajemen Pengguna — Profit SaaS')
@section('page-title','Manajemen Pengguna')
@section('breadcrumb')
<a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dashboard</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<a href="{{ route('admin.index') }}" class="hover:text-gray-700">Panel Admin</a>
<svg class="w-3 h-3 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
<span class="font-medium text-gray-700">Pengguna</span>
@endsection

@section('page-content')

@php
$users = [
    ['id'=>1,'name'=>'Super Admin','email'=>'superadmin@profitsaas.id','role'=>'Super Admin','status'=>'active','joined'=>'01 Jan 2024','last_login'=>'Hari ini, 09:42','avatar'=>'S','color'=>'brand'],
    ['id'=>2,'name'=>'Ahmad Fauzi','email'=>'ahmad@company.id','role'=>'Admin','status'=>'active','joined'=>'15 Feb 2024','last_login'=>'Hari ini, 08:30','avatar'=>'A','color'=>'blue'],
    ['id'=>3,'name'=>'Sari Dewi','email'=>'sari@company.id','role'=>'Admin','status'=>'active','joined'=>'20 Mar 2024','last_login'=>'Kemarin, 16:45','avatar'=>'S','color'=>'purple'],
    ['id'=>4,'name'=>'Budi Santoso','email'=>'budi@company.id','role'=>'Viewer','status'=>'active','joined'=>'05 Apr 2024','last_login'=>'2 hari lalu','avatar'=>'B','color'=>'green'],
    ['id'=>5,'name'=>'Rini Wulandari','email'=>'rini@company.id','role'=>'Viewer','status'=>'active','joined'=>'10 Apr 2024','last_login'=>'Hari ini, 08:30','avatar'=>'R','color'=>'orange'],
    ['id'=>6,'name'=>'Dian Pratama','email'=>'dian@company.id','role'=>'Viewer','status'=>'inactive','joined'=>'12 May 2024','last_login'=>'1 minggu lalu','avatar'=>'D','color'=>'gray'],
    ['id'=>7,'name'=>'Eko Cahyono','email'=>'eko@company.id','role'=>'Admin','status'=>'active','joined'=>'01 Jun 2024','last_login'=>'3 jam lalu','avatar'=>'E','color'=>'teal'],
    ['id'=>8,'name'=>'Fitri Handayani','email'=>'fitri@company.id','role'=>'Viewer','status'=>'active','joined'=>'15 Jun 2024','last_login'=>'Kemarin, 11:20','avatar'=>'F','color'=>'pink'],
];
$roleColors = ['Super Admin'=>'brand','Admin'=>'blue','Viewer'=>'green'];
@endphp

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-3">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Cari pengguna..." class="pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500 w-64">
        </div>
        <select class="px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option value="">Semua Role</option>
            <option>Super Admin</option>
            <option>Admin</option>
            <option>Viewer</option>
        </select>
        <select class="px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option value="">Semua Status</option>
            <option>Aktif</option>
            <option>Nonaktif</option>
        </select>
    </div>
    <button onclick="document.getElementById('modal-add').classList.remove('hidden')"
            class="flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        Tambah Pengguna
    </button>
</div>

{{-- Stats row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([['Total','87 Pengguna','brand','M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],['Super Admin','2 Pengguna','red','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],['Admin','15 Pengguna','blue','M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z'],['Viewer','70 Pengguna','green','M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z']] as [$label,$val,$c,$icon])
    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm flex items-center gap-4">
        <div class="w-10 h-10 bg-{{ $c }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-{{ $c }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
        </div>
        <div>
            <p class="text-lg font-black text-gray-900">{{ $val }}</p>
            <p class="text-xs text-gray-500">{{ $label }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Table --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wide">Pengguna</th>
                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wide">Role</th>
                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wide hidden md:table-cell">Bergabung</th>
                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wide hidden lg:table-cell">Login Terakhir</th>
                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wide">Status</th>
                <th class="px-6 py-4"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($users as $u)
            @php $rc = $roleColors[$u['role']] ?? 'gray'; @endphp
            <tr class="hover:bg-gray-50/50 transition-colors group">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-{{ $u['color'] }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-sm font-black text-{{ $u['color'] }}-700">{{ $u['avatar'] }}</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $u['name'] }}</p>
                            <p class="text-xs text-gray-400">{{ $u['email'] }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2.5 py-1 text-xs font-bold bg-{{ $rc }}-50 text-{{ $rc }}-700 rounded-full">{{ $u['role'] }}</span>
                </td>
                <td class="px-6 py-4 hidden md:table-cell">
                    <span class="text-sm text-gray-500">{{ $u['joined'] }}</span>
                </td>
                <td class="px-6 py-4 hidden lg:table-cell">
                    <span class="text-sm text-gray-500">{{ $u['last_login'] }}</span>
                </td>
                <td class="px-6 py-4">
                    @if($u['status']==='active')
                    <span class="flex items-center gap-1.5 text-xs font-semibold text-green-700">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Aktif
                    </span>
                    @else
                    <span class="flex items-center gap-1.5 text-xs font-semibold text-gray-400">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full"></span> Nonaktif
                    </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-1.5 rounded-lg hover:bg-blue-50 text-gray-400 hover:text-blue-600 transition-colors" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button class="p-1.5 rounded-lg hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors" title="Hapus">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100">
        <p class="text-sm text-gray-500">Menampilkan 8 dari 87 pengguna</p>
        <div class="flex items-center gap-1">
            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-400" disabled>←</button>
            @foreach([1,2,3,'...',9] as $p)
            <button class="px-3 py-1.5 text-sm border rounded-lg {{ $p===1?'bg-brand-600 text-white border-brand-600':'border-gray-200 hover:bg-gray-50 text-gray-600' }}">{{ $p }}</button>
            @endforeach
            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600">→</button>
        </div>
    </div>
</div>

{{-- Add User Modal --}}
<div id="modal-add" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('modal-add').classList.add('hidden')"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-gray-900">Tambah Pengguna Baru</h3>
            <button onclick="document.getElementById('modal-add').classList.add('hidden')" class="p-2 rounded-xl hover:bg-gray-100 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form class="space-y-4">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Depan</label>
                    <input type="text" placeholder="Ahmad" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Belakang</label>
                    <input type="text" placeholder="Fauzi" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                <input type="email" placeholder="nama@perusahaan.com" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Role</label>
                <select class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option>Viewer</option>
                    <option>Admin</option>
                    <option>Super Admin</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password Sementara</label>
                <input type="password" placeholder="Min. 8 karakter" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-gray-300 rounded focus:ring-brand-500">
                <span class="text-sm text-gray-600">Kirim email undangan ke pengguna</span>
            </label>
            <div class="flex items-center gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modal-add').classList.add('hidden')"
                        class="flex-1 py-2.5 border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Batal
                </button>
                <button type="submit" class="flex-1 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-sm font-bold transition-colors">
                    Tambahkan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
