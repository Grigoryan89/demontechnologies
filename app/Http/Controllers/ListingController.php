<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{


    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->cursorPaginate(6);
        return view('listings.index')->with(['listings' => $listings]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formValidate = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'website' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

        if ($request->hasFile('logo')){
            $formValidate['logo'] = $request->file('logo')->store('logos','public');
        }

        Listing::create($formValidate);

       return redirect('/')->with('success','Listings in created');
    }

    /**
     * @param Request $id
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('listings.show')->with(['listing' => $listing]);
    }


}
