@extends('layouts.admin')

@section('page_title', 'Tambah Pengurus')
@section('page_subtitle', 'Menambahkan data pengurus')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">

        <form
            action="{{ route('admin.penguruses.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <!-- Jabatan -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Jabatan
                </label>

                <select
                    name="jabatan_id"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

                    <option value="">-- Pilih Jabatan --</option>

                    @foreach($jabatans as $jabatan)

                        <option value="{{ $jabatan->id }}">
                            {{ $jabatan->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Nama -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Nama Pengurus
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama pengurus"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Deskripsi -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="Masukkan deskripsi"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>

            </div>

            <!-- Gaji -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Gaji
                </label>

                <input
                    type="number"
                    name="salary"
                    placeholder="Contoh : 5000000"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                    Simpan

                </button>

                <a href="{{ route('admin.penguruses.index') }}"
                    class="px-6 py-3 bg-slate-100 rounded-2xl font-bold hover:bg-slate-200 transition">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection