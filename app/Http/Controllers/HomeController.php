<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\GendersModel;
use App\Models\HomeBannerModel;
use App\Models\ProductsModel;
use App\Models\SeriesModel;
use App\Models\SubCategoriesModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function assetsDownload($image): JsonResponse
    {
        try {
            if ($image !== '') {
                Storage::download(public_path('assets/'.$image));
            }
        }catch (\Exception){
            return response()->json(['message'=>'error']);
        }
        return response()->json('');
    }
    public function index(HomeBannerModel $homeBannerModel,GendersModel $gendersModel, SeriesModel $seriesModel, ProductsModel $productsModel): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'banner1' => $homeBannerModel->banner1(),
                    'banner2' => $homeBannerModel->banner2(),
                    'series' => $seriesModel->ALlDataSeries(),
                    'whatsHot' => $productsModel->newProducts(),
                    'gender' => $gendersModel->AllDataGender(),
                ],
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
