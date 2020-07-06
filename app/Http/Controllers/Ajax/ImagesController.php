<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Image;
use FFI\Exception;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function remove(Image $image)
    {
       // dd($image);
        $image->delete();
        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }
}
