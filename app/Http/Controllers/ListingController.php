<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\View\View;

class ListingController extends Controller
{
    public function index(): View
    {
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }

    public function show(Listing $listing): View
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
