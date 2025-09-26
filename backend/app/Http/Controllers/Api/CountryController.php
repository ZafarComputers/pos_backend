<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return response()->json(Country::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'code'     => 'required|string|max:10|unique:countries,code',
            'currency' => 'required|string|max:10',
            'status'   => 'required|in:active,inactive',
        ]);

        $country = Country::create($data);

        return response()->json($country, 201);
    }

    public function show(Country $country)
    {
        return response()->json($country);
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'code'     => 'required|string|max:10|unique:countries,code,' . $country->id,
            'currency' => 'required|string|max:10',
            'status'   => 'required|in:active,inactive',
        ]);

        $country->update($data);

        return response()->json($country);
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json(['message' => 'Country deleted']);
    }
}
