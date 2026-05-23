@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-10 px-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-extrabold text-slate-800">
                Data Partner
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola seluruh partner pendukung platform.
            </p>

        </div>

        <!-- BUTTON -->
        <a href="{{ route('partners.create') }}"
            class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">

            + Tambah Partner

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

            <!-- HEAD -->
            <thead class="bg-slate-100">

                <tr>

                    <th class="p-4 text-left">
                        ID
                    </th>

                    <th class="p-4 text-left">
                        Logo
                    </th>

                    <th class="p-4 text-left">
                        Nama Partner
                    </th>

                    <th class="p-4 text-left">
                        Created At
                    </th>

                    <th class="p-4 text-left">
                        Updated At
                    </th>

                    <th class="p-4 text-center">
                        Action
                    </th>

                </tr>

            </thead>

            <!-- BODY -->
            <tbody>

                @forelse($partners as $partner)

                <tr class="border-t hover:bg-slate-50 transition">

                    <!-- ID -->
                    <td class="p-4">

                        {{ $partner->id }}

                    </td>

                    <!-- LOGO -->
                    <td class="p-4">

                        <div class="w-14 h-14 bg-slate-100 rounded-xl flex items-center justify-center overflow-hidden">

                            <img
                                src="{{ $partner->logo_url }}"
                                alt="{{ $partner->name }}"
                                class="h-10 object-contain">

                        </div>

                    </td>

                    <!-- NAME -->
                    <td class="p-4 font-semibold">

                        {{ $partner->name }}

                    </td>

                    <!-- CREATED -->
                    <td class="p-4">

                        {{ $partner->created_at }}

                    </td>

                    <!-- UPDATED -->
                    <td class="p-4">

                        {{ $partner->updated_at }}

                    </td>

                    <!-- ACTION -->
                    <td class="p-4 flex gap-3 justify-center">

                        <!-- EDIT -->
                        <a href="{{ route('partners.edit', $partner->id) }}"
                            class="px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">

                            Edit

                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('partners.destroy', $partner->id) }}"
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

                    <td colspan="6"
                        class="text-center p-6 text-slate-500">

                        Data partner kosong.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection