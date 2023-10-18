<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BannerModel $bannerModel)
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => $bannerModel->getBanner(),
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, BannerModel $bannerModel)
    {
        $validate = $request->validate([
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
        $query = $bannerModel->createBanner($data);

        if ($query) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannerModel $bannerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerModel $bannerModel)
    {
        //
    }
}
