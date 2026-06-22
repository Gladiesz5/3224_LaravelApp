<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
public function index(Request $request)
{
    $transactions = Transaction::with('event')

        ->when($request->search, function ($query) use ($request) {
            $query->where('customer_name', 'like', '%' . $request->search . '%')
                  ->orWhere('customer_email', 'like', '%' . $request->search . '%')
                  ->orWhere('order_id', 'like', '%' . $request->search . '%');
        })

        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })

        ->when($request->event_id, function ($query) use ($request) {
            $query->where('event_id', $request->event_id);
        })

        ->latest()
        ->paginate(10);

    $events = \App\Models\Event::all();

    return view(
        'admin.transactions.index',
        compact('transactions', 'events')
    );
}
}
