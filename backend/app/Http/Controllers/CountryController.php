<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $countries = Country::all();
        return view('counties.index', compact('countries'));
        
        // $countries = Country::latest()->get();
        // return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'code' => 'required|unique:countries,code',
            'currency' => 'required',
            'status' => 'required',
        ]);
        $country = Country::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'country' => $country]);
        }

        return redirect()->route('countries.index')->with('success','Country created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'code' => "required|unique:countries,code,$country->id",
            'currency' => 'required',
            'status' => 'required',
        ]);

        $country->update($data);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'country' => $country]);
        }

        return redirect()->route('countries.index')->with('success','Country updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        //
    }
}
