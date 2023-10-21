<?php

namespace App\Http\Controllers;

use App\Models\EventsModel;
use Illuminate\Http\Request;

class EventsController extends Controller
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
    public function store(Request $request, EventsModel $eventsModel): void
    {
        $data = $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'imgPath' => 'required',
            'eventBegin' => 'required',
            'eventEnd' => 'required',
            'slug' => 'required',
        ]);
        $eventsModel->createEvents($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventsModel $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventsModel $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventsModel $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsModel $events)
    {
        //
    }
}
