<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function show_photos(){
        return Photo::all(); 
    }
}
