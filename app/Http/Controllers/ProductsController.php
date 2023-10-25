<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsModel $produkModel): JsonResponse
    {
        try {
            return response()->json([
               'message' => 'success',
                'data' => $produkModel->getDataProduk(),
            ]);
        }catch (QueryException $e){
            return response()->json([
               'message' =>  'error',
                'data' => []
            ],500);
        }
    }
    public function getProdukByKategori(ProductsModel $produkModel): JsonResponse
    {
        request()->input('events') != null  && $data = request('input');
        try {
            return response()->json([
                'message' => 'success',
                'data' => [$produkModel->produkByKategori(request()->input($data))],
            ]);
        }catch (QueryException $e){
            return response()->json([
                'message' => 'error',
                'data' => [],
            ],500);
        }
    }
    public function getProdukByGender(ProductsModel $produkModel): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => [$produkModel->produkByGender('wanita')],
            ]);
        }catch (QueryException $e){
            return response()->json([
                'message' => 'error',
                'data' => [],
            ],500);
        }
    }
    public function getNewProduk(ProductsModel $produkModel): JsonResponse
    {
        try {
            return response()->json([
               'massage' => 'success',
               'data' => [$produkModel->newProduk()]
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
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductsModel $produkModel): JsonResponse
    {
        $specs = [
            'color' => 'required',
            'size' => 'required',
            'material' => 'required',
        ];

        $imgData = [
            '1' => 'required|image',
            '2' => 'required|image',
            '3' => 'required|image',
            '4' => 'required|image',
        ];

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'specs' => json_encode($specs),
            'price' => 'required',
            'imgPath' => json_encode($imgData),
            'stock' => 'required',
            'seriesId' => 'required',
            'genderId' => 'required',
            'subCategoryId' => 'required',
        ]);
        $imgNames = [];

        foreach ($imgData as $key => $imageData) {
            $image = $request->file('imgPath.' . $key);

            if ($image) {
                $randomString = Str::random(15);
                $imgNameRandom = $key . $randomString;
                $imgName = $imgNameRandom . '.webp';

                $image->move(public_path('assets/'), $imgName);

                $img = Image::make(public_path('assets/') . $imgName);
                $img->encode('webp', 75)->save(public_path('assets/') . $imgName);

                $imgNames[$key] = $imgName;
            }
        }
        $data = array_merge($validate, ['imgPath' => json_encode($imgNames)]);
        $query = $produkModel->createProduk($data);

        if ($query) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductsModel $produkModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductsModel $produkModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductsModel $produkModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductsModel $produkModel)
    {
        //
    }
}
