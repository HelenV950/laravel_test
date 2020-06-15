<?php

namespace App\Services;

use App\Services\Contract\ImageServiceInterface;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ImageService implements ImageServiceInterface
{
  public function upload(UploadedFile $file)
  {
    $imagePath =  implode('/', str_split(Str::random(8), 2))
      . '/' . Str::random(16) . '_' . time() . '.' . $file->getClientOriginalExtension();
    // dd($imagePath);
    // dd($file);

    Storage::put(
      'public/' .
        $imagePath,
      File::get($file)

    );

    return $imagePath;
  }

  public function remove(string $file)
  {
    Storage::delete('public/' . $file);
  }
}
