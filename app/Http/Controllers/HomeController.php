<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(Request $request)
{
    $events = Event::with('category');

    // FILTER CATEGORY
    if ($request->category) {

        $events->whereHas('category', function ($query) use ($request) {

            $query->where('slug', $request->category);

        });

    }

    return view('welcome', [

        'events' => $events->get(),

        'categories' => Category::all(),

        // PARTNER
        'partners' => Partner::latest()->get()

    ]);
}
}
