@extends('layouts.admin')

@section('page_title', 'Edit Kategori')
@section('page_subtitle', 'Mengubah data kategori event')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">

        <form action="{{ route('categories.update', $category->id) }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            <!-- Nama Kategori -->
            <div>

                <label class="block mb-2 font-bold text-slate-700">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $category->name }}"
                    placeholder="Masukkan nama kategori"
                    class="w-full px-4 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Button -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                    Update

                </button>

                <a href="{{ route('categories.index') }}"
                    class="px-6 py-3 bg-slate-100 rounded-2xl font-bold hover:bg-slate-200 transition">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection