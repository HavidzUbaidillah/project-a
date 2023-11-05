<?php

namespace App\Http\Controllers;

use App\Models\HomeBannerModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeBannerController extends Controller
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
    public function store(Request $request, HomeBannerModel $homeBannerModel): JsonResponse
    {
        $validate = $request->validate([
            'slug' => '',
            'description' => 'required',
            'imgPath' => 'required|image'
        ]);
        $image = $request->file('imgPath');
        $randomString = Str::random(15);
        $imgNameRandom = substr($image->getClientOriginalName(), 0, 0) . $randomString;

        $imgName = $imgNameRandom . '.webp';
        $data = array_merge($validate, ['imgPath' => $imgName]);
        $image->move(public_path('assets/'), $imgName);

        $img = Image::make(public_path('assets/') . $imgName);
        $img->encode('webp', 75)->save(public_path('assets/') . $imgName);
        $query = $homeBannerModel->createNewBanner($data);
        if ($query){
            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
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
