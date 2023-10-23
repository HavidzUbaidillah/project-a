<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\GendersModel;
use App\Models\SeriesModel;
use App\Models\SubCategoriesModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function assetsDownload($image): StreamedResponse|JsonResponse
    {
        try {
            if ($image != null) {
                return Storage::download('public/assets/'.$image);
            }
            else{
                throw new \Error();
            }
        }catch (\Exception){
            return response()->json(['message'=>'error']);
        }

    }
    public function index(CategoriesModel $categoriesModel, SubCategoriesModel $subCategoriesModel, GendersModel $gendersModel, SeriesModel $seriesModel): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'men' => [
                        'shoes' => $subCategoriesModel->subCategoriesShoesMen(),
                        'cloth' => $subCategoriesModel->subCategoriesClothMen(),
                        'accessories' => $subCategoriesModel->subCategoriesAccesoriesMen(),
                    ],
                    'women' => [
                        'shoes' => $subCategoriesModel->subCategoriesShoesWomen(),
                        'cloth' => $subCategoriesModel->subCategoriesClothWomen(),
                        'accessories' => $subCategoriesModel->subCategoriesAccesoriesWomen(),
                    ],
                    'kids' => [

                    ]
                ],
//                    'series' => $seriesModel->ALlDataSeries(),
//                    'whatsHot' => [
//
//                    ],
//                    'gender' => $gendersModel->AllDataGender(),
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
