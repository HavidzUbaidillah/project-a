<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesModel $categoriesModel): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'categories,' => $categoriesModel->AllDataCategories(),
            ]);
        }catch (QueryException $e){
            return response()->json([
                'message' => 'error',
                'data' => [],
            ]);
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
    public function store(Request $request, CategoriesModel $categoriesModel): JsonResponse
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'imgPath' => 'required|image'
            ]);
            $image = $request->file('imgPath');
            $randomString = Str::random(15);
            $imgNameRandom = substr($image->getClientOriginalName(), 0, 0) . $randomString;

            $imgName = $imgNameRandom . '.webp';
            $data = array_merge($validate, ['imgPath' => $imgName]);

            $image->move(public_path('storage/banner/'), $imgName);

            $img = Image::make(public_path('storage/banner/') . $imgName);
            $img->encode('webp', 75)->save(public_path('storage/banner/') . $imgName);
            $categoriesModel->createNewCategories($data);
            return response()->json(['message' => 'success']);
        }catch (QueryException $e){
            return response()->json(['message' => 'error'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriesModel $kategoriModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriesModel $categoriesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriesModel $categoriesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriesModel $categoriesModel)
    {
        //
    }
}
