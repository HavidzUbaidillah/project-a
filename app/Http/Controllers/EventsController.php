<?php

namespace App\Http\Controllers;

use App\Models\EventsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
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
    public function store(Request $request, EventsModel $eventsModel): void
    {
        $validate = $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'imgPath' => 'required|image',
            'eventBegin' => 'required',
            'eventEnd' => 'required',
            'slug' => 'required',
        ]);
        $image = $request->file('imgPath');
        $randomString = Str::random(15);
        $imgNameRandom = substr($image->getClientOriginalName(), 0, 0) . $randomString;

        $imgName = $imgNameRandom . '.webp';
        $data = array_merge($validate, ['imgPath' => $imgName]);

        $image->move(public_path('assets/'), $imgName);

        $img = Image::make(public_path('assets/') . $imgName);
        $img->encode('webp', 75)->save(public_path('assets/') . $imgName);
        $eventsModel->createEvents($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventsModel $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventsModel $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventsModel $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsModel $events)
    {
        //
    }
}
