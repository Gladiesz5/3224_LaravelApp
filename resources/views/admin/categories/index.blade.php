@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-10 px-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-extrabold text-slate-800">
                Data Kategori
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola seluruh kategori event.
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
            class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">

            + Tambah Kategori

        </a>

    </div>

  <!-- SEARCH -->
<form method="GET" class="mb-6">

    <div class="flex gap-3">

        <!-- INPUT -->
        <input
            type="text"
            name="search"
            placeholder="Cari kategori..."
            value="{{ request('search') }}"
            class="w-full border border-slate-300 rounded-2xl px-5 py-4 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">

        <!-- BUTTON -->
        <button
            type="submit"
            class="px-6 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-semibold transition shadow-md">

            Cari

        </button>

    </div>

</form>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Nama Kategori</th>
                    <th class="p-4 text-left">Created At</th>
                    <th class="p-4 text-left">Updated At</th>
                    <th class="p-4 text-center">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr class="border-t hover:bg-slate-50 transition">

                    <td class="p-4">{{ $category->id }}</td>

                    <td class="p-4 font-semibold">
                        {{ $category->name }}
                    </td>

                    <td class="p-4">
                        {{ $category->created_at }}
                    </td>

                    <td class="p-4">
                        {{ $category->updated_at }}
                    </td>

                    <td class="p-4 flex gap-3 justify-center">

                        <!-- EDIT -->
                        <a href="{{ route('categories.edit', $category->id) }}"
                            class="px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">

                            Edit

                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('categories.destroy', $category->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin hapus data?')"
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-6 text-slate-500">

                        Data kategori kosong.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection