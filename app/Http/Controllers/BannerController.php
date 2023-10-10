<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BannerModel $bannerModel)
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => $bannerModel->getBanner(),
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
    public function show(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannerModel $bannerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerModel $bannerModel)
    {
        //
    }
}
