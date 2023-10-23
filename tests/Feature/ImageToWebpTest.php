<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Tests\TestCase;

class ImageToWebpTest extends TestCase
{
    public function testImageConv()
    {
        $imgName="test.jpeg";
        $img = Image::make(public_path('public/storage/genders/') . $imgName);

        $webp = $img->encode('webp', 75)->save(storage_path('public/genders'));

//        $extension = $webp->getDriver()->encoder->format;

        Storage::copy(storage_path('public/storage/genders/')
            . $imgName, storage_path('public/storage/genders/').'test.webp');

        dump($img);
        self::assertTrue(true);

    }
}
