<?php

namespace App\Services;

use App\Services\Contract\ImageServiceInterface;
use File;
use Illuminate\Http\UploadedFile;
use Storage;
use Str;

class ImageService implements ImageServiceInterface
{
  public function upload(UploadedFile $file)
  {
    $imagePath = 'public/' . implode('/', str_split(Str::random(8), 2))
    .'/'
    .Str::random(16) . '_' . time() . '.' . $file->getClientOriginalExtension();
    // dd($imagePath);
    // dd($file);

    Storage::put(
      $imagePath,
      File::get($file)
   
    );

    return $imagePath;
  }

  public function remove(string $file)
  {
    dd($file);
  }
}
