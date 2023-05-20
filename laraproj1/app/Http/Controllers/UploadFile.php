<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class UploadFile extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    //
    dd("aaaaaaaaaa");
  }
public function upload(Request $request)
    {
    //
    dd($request->file('file'));
  try {
  $path=$request->file('file')->store('testpath');
    return $path;
    
  } catch ( Exception $th) {
      //throw $th; 
      return dd($request);
  }
  
  } 
public function manyfileupload(Request $request)
    {
    //
  $path=$request->file('file')->store('testpath');
    return $path;
  
  } 





public function image(Request $request)
    {
    //
    $path=$request->file('file')->store('public');
    $sourceFile = '../storage/app/'.$path;
    $outputFile = '../storage/app/public/compressed-image.jpg';  
    $outputQuality = 30;
    $imageLayer = imagecreatefromjpeg($sourceFile);
    imagejpeg($imageLayer,$outputFile,$outputQuality);
    // return Storage::download("public/compressed-image.jpg");
    // $filename = "../..".Storage::url($path);
// $resizedFilename = "../myresizedimage.png";
// // return $filename;
// // resize the image with 300x300
// $imgData = resize_image($filename, 300, 300);
// // save the image on the given filename
//     imagepng($imgData, $resizedFilename);
// or according to the original format, use another method
// imagejpeg($imgData, $resizedFilename);
    // imagegif($imgData, $resizedFilename);   
    return Storage::url($path);
  
  } 


}
















/**
 * Resize image given a height and width and return raw image data.
 *
 * Note : You can add more supported image formats adding more parameters to the switch statement.
 *
 * @param type $file filepath
 * @param type $w width in px
 * @param type $h height in px
 * @param type $crop Crop or not
 * @return type
 */

