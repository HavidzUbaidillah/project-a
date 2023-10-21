<?php

namespace App\Http\Controllers;

use App\Models\SeriesModel;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, SeriesModel $seriesModel)
    {
        $data = $request->validate([
            'name' => 'required',
            'imgPath' => 'required|image',
            'description' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SeriesModel $seriesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeriesModel $seriesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeriesModel $seriesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeriesModel $seriesModel)
    {
        //
    }
}
