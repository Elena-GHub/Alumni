<?php

namespace App\Http\Controllers;

use App\scorepoints;
use Illuminate\Http\Request;

class ScorepointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Scorepoints");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\scorepoints  $scorepoints
     * @return \Illuminate\Http\Response
     */
    public function show(scorepoints $scorepoints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\scorepoints  $scorepoints
     * @return \Illuminate\Http\Response
     */
    public function edit(scorepoints $scorepoints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\scorepoints  $scorepoints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scorepoints $scorepoints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\scorepoints  $scorepoints
     * @return \Illuminate\Http\Response
     */
    public function destroy(scorepoints $scorepoints)
    {
        //
    }
}
