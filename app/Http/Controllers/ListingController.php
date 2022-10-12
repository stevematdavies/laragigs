<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ListingController extends Controller
{
    public function index(): View
    {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag','search']))
                ->get()
        ]);
    }

    public function show(Listing $listing): View
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create(): View
    {
        return view('listings.create');
    }

    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description'=> 'required'
        ]);

        Listing::create($formFields);

        return redirect('/');
    }


}
