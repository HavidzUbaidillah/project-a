<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\GendersModel;
use App\Models\SubCategoriesModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesModel $categoriesModel, SubCategoriesModel $subCategoriesModel, GendersModel $gendersModel): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'genders' => $gendersModel->getGender(),
                'categories' => $categoriesModel->AllDataCategories(),
                'subCategories' => $subCategoriesModel->AllDataSubCategories(),
            ]);
        }catch (QueryException $e){
            return response()->json(['message'=>'error'],500);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
