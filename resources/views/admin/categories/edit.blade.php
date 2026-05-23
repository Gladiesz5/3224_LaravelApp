@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">
        Edit Kategori
    </h1>

    <form action="{{ route('categories.update', $category->id) }}"
        method="POST"
        class="space-y-6 bg-white p-8 rounded-2xl shadow-md">

        @csrf
        @method('PUT')

        <div>

            <label class="font-semibold block mb-2">
                Nama Kategori
            </label>

            <input type="text"
                name="name"
                value="{{ $category->name }}"
                class="w-full border rounded-xl px-4 py-3">

        </div>

        <button
            class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold">

            Update

        </button>

    </form>

</div>

@endsection