@extends('layouts.admin')

@section('title', 'Kelola Kategori')
@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Buat dan atur kategori event di sini.')

@section('content')

<!-- HEADER -->
<div class="mb-4 flex justify-between items-center">

    <!-- SEARCH -->
    <form method="GET" class="flex gap-2">

        <input
            type="text"
            name="search"
            placeholder="Cari kategori..."
            value="{{ request('search') }}"
            class="px-4 py-3 rounded-2xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none">

        <button
            type="submit"
            class="px-5 py-3 bg-slate-100 rounded-2xl font-semibold hover:bg-slate-200 transition">

            Cari

        </button>

    </form>

    <!-- BUTTON TAMBAH -->
    <a href="{{ route('categories.create') }}"
        class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">

        + Tambah Kategori

    </a>

</div>

<!-- TABLE -->
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-left border-collapse">

            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">

                <tr>

                    <th class="px-8 py-4">ID</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Created At</th>
                    <th class="px-8 py-4">Updated At</th>
                    <th class="px-8 py-4">Aksi</th>

                </tr>

            </thead>

            <tbody class="divide-y border-t">

                @forelse($categories as $category)

                <tr class="hover:bg-slate-50/50 transition">

                    <!-- ID -->
                    <td class="px-8 py-6 font-bold text-slate-400">

                        {{ $category->id }}

                    </td>

                    <!-- NAMA -->
                    <td class="px-8 py-6">

                        <p class="font-black text-slate-800">

                            {{ $category->name }}

                        </p>

                    </td>

                    <!-- CREATED -->
                    <td class="px-8 py-6 text-slate-500">

                        {{ $category->created_at }}

                    </td>

                    <!-- UPDATED -->
                    <td class="px-8 py-6 text-slate-500">

                        {{ $category->updated_at }}

                    </td>

                    <!-- AKSI -->
                    <td class="px-8 py-6">

                        <div class="flex gap-2">

                            <!-- EDIT -->
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>

                                </svg>

                            </a>

                            <!-- DELETE -->
                            <form
                                action="{{ route('categories.destroy', $category->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus kategori ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">

                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>

                                    </svg>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="px-8 py-10 text-center text-slate-500">

                        Belum ada kategori yang ditambahkan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection