<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        return response()->json(City::with('state.country')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'status'   => 'required|in:active,inactive',
        ]);

        $city = City::create($data);

        return response()->json($city, 201);
    }

    public function show(City $city)
    {
        return response()->json($city->load('state.country'));
    }

    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'status'   => 'required|in:active,inactive',
        ]);

        $city->update($data);

        return response()->json($city);
    }

    public function destroy(City $city)
    {
        $city->delete();
        return response()->json(['message' => 'City deleted']);
    }
}
