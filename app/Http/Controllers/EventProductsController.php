<?php

namespace App\Http\Controllers;

use App\Models\EventProductsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EventProductsController extends Controller
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
    public function store(Request $request, EventProductsModel $eventProductsModel): void
    {
        $data = $request->validate([
           'productId' => 'required',
           'eventId' => 'required'
        ]);
        $eventProductsModel->createEventProducts($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventProductsModel $eventProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventProductsModel $eventProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventProductsModel $eventProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventProductsModel $eventProducts)
    {
        //
    }
}
