<?php

namespace App\Http\Controllers;

use App\Models\TopProdukModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TopProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TopProdukModel $topProdukModel): JsonResponse
    {
        try {
            return response()->json([
               'message' => 'success',
               'data' => $topProdukModel->getTopProduk(),
            ]);
        }catch(QueryException $e){
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
    public function show(TopProdukModel $topProdukModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TopProdukModel $topProdukModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopProdukModel $topProdukModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopProdukModel $topProdukModel)
    {
        //
    }
}
