@extends('layouts.admin')

@section('page_title', 'Edit Pengurus')
@section('page_subtitle', 'Mengubah data pengurus')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">

        <form
            action="{{ route('admin.penguruses.update', $pengurus->id) }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            <!-- Jabatan -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Jabatan
                </label>

                <select
                    name="jabatan_id"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

                    @foreach($jabatans as $jabatan)

                        <option
                            value="{{ $jabatan->id }}"
                            {{ $pengurus->jabatan_id == $jabatan->id ? 'selected' : '' }}>

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
                    value="{{ $pengurus->name }}"
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
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ $pengurus->description }}</textarea>

            </div>

            <!-- Gaji -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Gaji
                </label>

                <input
                    type="number"
                    name="salary"
                    value="{{ $pengurus->salary }}"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                    Update

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