<?php

namespace App\Http\Controllers;

use App\NewImages;
use Illuminate\Http\Request;

class NewImagesController extends Controller
{

    public function gallery(){
        return view('about.gallery', [
            'images' => NewImages::where('deleted', 0)->latest()->get()
        ]);
    }
}
