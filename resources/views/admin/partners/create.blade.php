@extends('layouts.admin')

@section('page_title', 'Tambah Partner')
@section('page_subtitle', 'Menambahkan partner baru')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">

        <form
            action="{{ route('admin.partners.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <!-- Nama Partner -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Nama Partner
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama partner"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Logo URL -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Logo URL
                </label>

                <input
                    type="text"
                    name="logo_url"
                    placeholder="https://..."
                    value="{{ old('logo_url') }}"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Button -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                    Simpan

                </button>

                <a href="{{ route('admin.partners.index') }}"
                    class="px-6 py-3 bg-slate-100 rounded-2xl font-bold hover:bg-slate-200 transition">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection