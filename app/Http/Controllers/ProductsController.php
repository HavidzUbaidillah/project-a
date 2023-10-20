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
        request()->input('kategori') != null  && $data = request('input');
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
    public function store(Request $request, ProductsModel $produkModel)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'imgPath' => 'required|image',
            'kategoriId' => 'required',
            'genderId' => 'required',
        ]);

        $image = $request->file('imgPath');
        $randomString = Str::random(15);
        $imgNameRandom = substr($image->getClientOriginalName(), 0, 0) . $randomString;

        $imgName = $imgNameRandom . '.webp';
        $data = array_merge($validate, ['imgPath' => $imgName]);

        $image->move(public_path('storage/banner/'), $imgName);

        $img = Image::make(public_path('storage/banner/') . $imgName);
        $img->encode('webp', 75)->save(public_path('storage/banner/') . $imgName);
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
