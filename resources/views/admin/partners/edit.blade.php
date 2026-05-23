@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

<h1 class="text-3xl font-bold mb-6">

Edit Partner

</h1>

<form
action="{{ route('partners.update',$partner->id) }}"
method="POST"
class="bg-white p-8 rounded-2xl shadow space-y-6">

@csrf
@method('PUT')

<input
type="text"
name="name"
value="{{ $partner->name }}"
class="w-full border rounded-xl px-4 py-3">

<input
type="text"
name="logo_url"
value="{{ $partner->logo_url }}"
class="w-full border rounded-xl px-4 py-3">

<button
class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

Update

</button>

</form>

</div>

@endsection