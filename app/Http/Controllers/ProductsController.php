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
                'data' => $produkModel->AllDataProduk(),
            ]);
        }catch (QueryException){
            return response()->json([
               'message' =>  'error',
                'data' => []
            ],500);
        }
    }
    public function getPr(Request $request, ProductsModel $productsModel): JsonResponse
    {
        $paramCat = $request->input('categories');
        $paramGen = $request->input('gender');
        $paramMin = $request->input('min');
        $paramMax = $request->input('max');
        $products = $productsModel->searchSide($paramCat,$paramGen,$paramMin,$paramMax);
        if ($products !== false){
            return response()->json([
                'message' => 'success',
                'data' => $products
            ]);
        }else{
            return response()->json([
                'message' => 'error',
                'data' => []
            ],500);
        }
    }

    public function searchProductByName(ProductsModel $produkModel, Request $input): JsonResponse
    {
        $keyword = $input->input('search');
        $query = $produkModel->productByName($keyword);
        if ($query !== false){
            return response()->json([
                'message' => 'success',
                'data' => [
                    'series' => $query['series'],
                    'products' => $query['products'],
                ],
            ]);
        }else{
            return response()->json([
                'message' => 'error',
                'data' => [],
            ],500);
        }
    }

    public function getProductById(ProductsModel $produkModel, Request $input): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => $produkModel->dataProductById($input['input']),
            ]);
        }catch (QueryException){
            return response()->json([
                'message' => 'error',
                'data' => [],
            ],500);
        }
    }
    public function getProductByName(ProductsModel $produkModel, Request $input): JsonResponse
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => $produkModel->dataProductByName($input['input']),
            ]);
        }catch (QueryException $e){
            return response()->json([
                'message' => 'error',
                'data' => [],
            ],500);
        }
    }

    public function whatsHot(ProductsModel $produkModel): JsonResponse
    {
        try {
            return response()->json([
               'massage' => 'success',
               'data' => [$produkModel->newProducts()]
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
    public function store(Request $request, ProductsModel $productsModel): JsonResponse
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'material' => 'required',
            'size' => 'required',
            'price' => 'required',
            'img1' => 'required|image',
            'img2' => 'required|image',
            'img3' => 'required|image',
            'img4' => 'required|image',
            'stock' => 'required',
            'seriesId' => 'required',
            'genderId' => 'required',
            'categoryId' => 'required',
            'subCategoryId' => 'required',
        ]);
//        dd($validate);

        $imgArr = [];
        foreach (['img1','img2','img3','img4'] as $key){
            $image = $request->file($key);
            $randomStr= Str::random(15);
//            dd($image);$image
            $imgName = substr($image->getClientOriginalName(),0,0) . $randomStr;
            $imgNames = $imgName . '.webp';
            $data = array_merge($validate,   [$key => $imgNames]);
            $image->move(public_path('assets/'), $imgNames);
            $imgPaths = public_path('assets/'.$imgNames);
//            dd($imgPaths);
            $img = Image::make($imgPaths);
            $img->encode('webp', 75)->save(public_path('assets/') . $imgName);
            $imgArr[$key] = $imgNames;
        }

        foreach ($imgArr as $key => $value){
            $data[$key] = $value;
        }

        $query = $productsModel->createProducts($data);
//        dd($query);
        if ($query){
            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'failed']);
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
    public function destroy(ProductsModel $produkModel, Request $input): JsonResponse
    {
        $data = $produkModel->deleteProduct($input);
        if ($data){
            return response()->json(['message' => 'succes']);
        }else {
            return response()->json(['message' => 'error']);
        }
    }
}
