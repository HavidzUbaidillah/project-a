<?php

namespace App\Http\Controllers;

use App\Models\SeriesModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SeriesController extends Controller
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
    public function store(Request $request, SeriesModel $seriesModel): JsonResponse
    {
        $validate = $request->validate([
            'name' => 'required',
            'imgPath' => 'required|image',
        ]);
        $image = $request->file('imgPath');
        $randomString = Str::random(15);
        $imgNameRandom = substr($image->getClientOriginalName(), 0, 0) . $randomString;

        $imgName = $imgNameRandom . '.webp';
        $data = array_merge($validate, ['imgPath' => $imgName]);
        $image->move(public_path('assets/'), $imgName);

        $img = Image::make(public_path('assets/') . $imgName);
        $img->encode('webp', 75)->save(public_path('assets/') . $imgName);
        $dataSeries = $seriesModel->createNewSeries($data);
        if ($dataSeries){
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message'=>'error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SeriesModel $seriesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeriesModel $seriesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeriesModel $seriesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeriesModel $seriesModel)
    {
        //
    }
}
