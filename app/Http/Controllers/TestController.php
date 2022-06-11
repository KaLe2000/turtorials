<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $image = \App\Models\Image::find(6);

        return view('cabinet.test', [
            'image' => $image,
        ]);
    }
}
