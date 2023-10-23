<?php

namespace App\Http\Controllers;

use App\Models\GendersModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GendersModel $genderModel)
    {
        try {
            return response()->json([
               'message' => 'success',
               'data' => $genderModel->getGender()
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
    public function store(Request $request, GendersModel $gendersModel): JsonResponse
    {
        try {
            $validate = $request->validate([
                'gender' => 'required',
                'imgPath' => 'required|image'
            ]);
            $image = $request->file('imgPath');
            $randomString = Str::random(15);
            $imgNameRandom = substr($image->getClientOriginalName(), 0, 0) . $randomString;

            $imgName = $imgNameRandom . '.webp';
            $data = array_merge($validate, ['imgPath' => $imgName]);
            $image->move(public_path('storage/genders/'), $imgName);

            $img = Image::make(public_path('storage/genders/') . $imgName);
            $img->encode('webp', 75)->save(public_path('storage/genders/') . $imgName);
            $gendersModel->createGender($data);
            return response()->json(['message' => 'success']);
        }catch (QueryException $e){
            return response()->json(['message' => 'error']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(GendersModel $genderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GendersModel $genderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GendersModel $genderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GendersModel $genderModel)
    {
        //
    }
}
