<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Rating;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Event
    |--------------------------------------------------------------------------
    */

    public function show(Event $event)
    {
        $categories = Category::all();

        $ratings = $event->ratings()
            ->with('user')
            ->latest()
            ->get();

        $averageRating = round($event->ratings()->avg('rating'), 1);

        return view('event-detail', compact(
            'categories',
            'event',
            'ratings',
            'averageRating'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Rating
    |--------------------------------------------------------------------------
    */

    public function storeRating(Request $request, Event $event)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:500',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'event_id' => $event->id,
            ],
            [
                'rating' => $request->rating,
                'review' => $request->review,
            ]
        );

        return back()->with('success', 'Rating berhasil disimpan.');
    }

    /*
    |--------------------------------------------------------------------------
    | Ticket
    |--------------------------------------------------------------------------
    */

    public function ticket(Transaction $transaction)
    {
        return view('ticket', compact('transaction'));
    }
}