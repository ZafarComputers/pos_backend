<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd('its state controller simple');
        $states = State::all();
        // return $states; // Returns all states as JSON
        return view('states.index', compact('states')); // Pass states to a Blade view
        // return response()->json(State::with('country')->get());
    }

    // If you want to return a view with the states
    public function showStatesInView()
    {
        $states = State::all();
        return view('states.index', compact('states')); // Pass states to a Blade view
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
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
