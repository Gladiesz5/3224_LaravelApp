@extends('layouts.admin')

@section('title', 'Laporan Transaksi - Admin')
@section('page_title', 'Laporan Transaksi')
@section('page_subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')

<div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-xl overflow-hidden">

<!-- Header -->
<div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
    <h2 class="text-2xl font-bold text-white">
        Laporan Transaksi
    </h2>
    <p class="text-indigo-100 text-sm mt-1">
        Monitoring transaksi dan penjualan tiket event
    </p>
</div>
<div class="px-8 py-6 border-b bg-slate-50">
    <form method="GET" action="{{ route('admin.transactions.index') }}">

        <div class="grid md:grid-cols-4 gap-4">

            <!-- Search -->
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama, email, Order ID..."
                class="px-4 py-3 rounded-xl border border-slate-300">

            <!-- Filter Status -->
            <select
                name="status"
                class="px-4 py-3 rounded-xl border border-slate-300">

                <option value="">Semua Status</option>

                <option value="success"
                    {{ request('status') == 'success' ? 'selected' : '' }}>
                    Success
                </option>

                <option value="pending"
                    {{ request('status') == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

            </select>

            <!-- Filter Event -->
            <select
                name="event_id"
                class="px-4 py-3 rounded-xl border border-slate-300">

                <option value="">Semua Event</option>

                @foreach($events as $event)
                    <option value="{{ $event->id }}"
                        {{ request('event_id') == $event->id ? 'selected' : '' }}>
                        {{ $event->title }}
                    </option>
                @endforeach

            </select>

            <!-- Tombol -->
            <div class="flex gap-2">

                <button
                    type="submit"
                    class="flex-1 bg-indigo-600 text-white rounded-xl font-semibold">
                    Filter
                </button>

                <a
                    href="{{ route('admin.transactions.index') }}"
                    class="flex-1 bg-slate-200 text-center py-3 rounded-xl font-semibold">
                    Reset
                </a>

            </div>

        </div>

    </form>
</div>

<!-- Table -->
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">

        <thead class="bg-slate-100 text-slate-600 uppercase text-[11px] font-black tracking-widest">
            <tr>
                <th class="px-8 py-4">Order ID</th>
                <th class="px-8 py-4">Detail Pembeli</th>
                <th class="px-8 py-4">Event</th>
                <th class="px-8 py-4">Tgl Transaksi</th>
                <th class="px-8 py-4">Status</th>
                <th class="px-8 py-4 text-right">Total Tagihan</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-100">

            @forelse($transactions as $trx)

            <tr class="hover:bg-indigo-50 transition-all duration-200 {{ $trx->status == 'pending' ? 'text-slate-400' : '' }}">

                <!-- Order ID -->
                <td class="px-8 py-6">
                    <span class="font-mono font-bold px-3 py-1 rounded-xl text-sm shadow-sm
                    {{ $trx->status == 'pending'
                        ? 'bg-slate-100 text-slate-500'
                        : 'bg-indigo-100 text-indigo-700' }}">
                        {{ $trx->order_id }}
                    </span>
                </td>

                <!-- Customer -->
                <td class="px-8 py-6">
                    <p class="font-bold text-slate-800 text-base">
                        {{ $trx->customer_name }}
                    </p>

                    <p class="text-xs text-slate-500 leading-relaxed">
                        {{ $trx->customer_email }}<br>
                        {{ $trx->customer_phone }}
                    </p>
                </td>

                <!-- Event -->
                <td class="px-8 py-6">
                    <p class="font-medium text-slate-700">
                        {{ $trx->event->title ?? '-' }}
                    </p>
                </td>

                <!-- Date -->
                <td class="px-8 py-6 text-sm text-slate-500">
                    {{ $trx->created_at->format('d M Y, H:i') }}
                </td>

                <!-- Status -->
                <td class="px-8 py-6">

                    @if($trx->status === 'settlement' || $trx->status === 'success')

                        <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase ring-1 ring-green-200">
                            Success
                        </span>

                    @elseif($trx->status === 'pending')

                        <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-bold uppercase ring-1 ring-orange-200">
                            Pending
                        </span>

                    @else

                        <span class="px-4 py-2 bg-rose-100 text-rose-700 rounded-full text-xs font-bold uppercase ring-1 ring-rose-200">
                            {{ $trx->status }}
                        </span>

                    @endif

                </td>

                <!-- Total -->
                <td class="px-8 py-6 text-right">
                    <span class="text-lg font-black text-emerald-600">
                        Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                    </span>
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="px-8 py-16 text-center">

                    <div class="flex flex-col items-center gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-12 h-12 text-slate-300"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M9 14l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <p class="text-slate-500 font-medium">
                            Belum ada transaksi
                        </p>

                    </div>

                </td>
            </tr>

            @endforelse

        </tbody>

    </table>
</div>

<!-- Footer -->
<div class="px-8 py-6 bg-slate-50 border-t flex justify-between items-center">

    <div>
        <p class="text-sm text-slate-500">
            Total Data :
            <span class="font-bold text-slate-700">
                {{ $transactions->total() }}
            </span>
        </p>
    </div>

    <div>
       {{ $transactions->appends(request()->query())->links() }}
    </div>

</div>

</div>

@endsection
