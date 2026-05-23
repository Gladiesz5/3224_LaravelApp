@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

<h1 class="text-3xl font-bold mb-6">

Tambah Partner

</h1>

<form
action="{{ route('partners.store') }}"
method="POST"
class="bg-white p-8 rounded-2xl shadow space-y-6">

@csrf

<input
type="text"
name="name"
placeholder="Nama Partner"
class="w-full border rounded-xl px-4 py-3">

<input
type="text"
name="logo_url"
placeholder="Logo URL"
class="w-full border rounded-xl px-4 py-3">

<button
class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

Simpan

</button>

</form>

</div>

@endsection