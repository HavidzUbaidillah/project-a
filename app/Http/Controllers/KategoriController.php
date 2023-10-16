<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KategoriModel $kategoriModel)
    {
        try {
            return response()->json([
                'message' => 'success',
                'data' => $kategoriModel->getKategori(),
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
    public function store(Request $request, KategoriModel $kategoriModel)
    {
        $validate = $request->validate([
           'nama' => 'required',
           'imgPath' => 'required|image'
        ]);
        $image = $request->file('imgPath');
        $imgName = encrypt($image->getClientOriginalName() );
        $data = array_merge($validate, ['imgPath' => $imgName]);

        $image->move(public_path('public/storage/kategori'), $imgName .'.'. $image->getClientOriginalExtension() );
        $query = $kategoriModel->createKategori($data);

        if ($query) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriModel $kategoriModel)
    {
        //
    }
}
