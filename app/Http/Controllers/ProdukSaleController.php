<?php

namespace App\Http\Controllers;

use App\Models\ProdukSaleModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdukSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProdukSaleModel $produkSaleModel)
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => $produkSaleModel->getProdukSale(),
            ]);
        }catch (QueryException $e){
            return response()->json([
                'message' => 'error',
                'data' => [],
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
    public function show(ProdukSaleModel $produkSaleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukSaleModel $produkSaleModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdukSaleModel $produkSaleModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukSaleModel $produkSaleModel)
    {
        //
    }
}
