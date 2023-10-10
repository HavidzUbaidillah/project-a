<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProdukModel $produkModel)
    {
        try {
            return response()->json([
               'messsage' => 'success',
                'data' => $produkModel->getDataProduk(),
            ]);
        }catch (QueryException $e){
            return response()->json([
               'message' =>  'error',
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
    public function show(ProdukModel $produkModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukModel $produkModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdukModel $produkModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukModel $produkModel)
    {
        //
    }
}
