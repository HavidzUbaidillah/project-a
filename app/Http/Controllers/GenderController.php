<?php

namespace App\Http\Controllers;

use App\Models\GenderModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GenderModel $genderModel)
    {
        try {
            return response()->json([
               'message' => 'success',
               'data' => $genderModel->getGender()
            ]);
        }catch (QueryException $e){
            return response()->json([
                'message' => 'error',
                'data' => []
            ],500);
        }
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
    public function show(GenderModel $genderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GenderModel $genderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GenderModel $genderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GenderModel $genderModel)
    {
        //
    }
}
