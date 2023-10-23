<?php

namespace App\Http\Controllers;

use App\Models\SubCategoriesModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
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
    public function store(Request $request, SubCategoriesModel $subCategoriesModel): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'categoryId' => 'required',
            'genderId' => 'required'
        ]);
        $dataSubCategory = $subCategoriesModel->createNewSubCategories($data);
        if ($dataSubCategory){
            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategoriesModel $subCategoriesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategoriesModel $subCategoriesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategoriesModel $subCategoriesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategoriesModel $subCategoriesModel)
    {
        //
    }
}
