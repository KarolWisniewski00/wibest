<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class OcrController extends Controller
{

    public function extractText(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images');
            $fullPath = storage_path('app/' . $path);
    
            // Get the MIME type of the image
            $mimeType = mime_content_type($fullPath);
    
            // Load the image based on its MIME type
            switch ($mimeType) {
                case 'image/jpeg':
                    $img = imagecreatefromjpeg($fullPath);
                    break;
                case 'image/png':
                    $img = imagecreatefrompng($fullPath);
                    break;
                case 'image/gif':
                    $img = imagecreatefromgif($fullPath);
                    break;
                default:
                    return response()->json(['error' => 'Unsupported image format.'], 400);
            }
    
            // Preprocess the image (convert to grayscale and increase contrast)
            imagefilter($img, IMG_FILTER_GRAYSCALE);
            imagefilter($img, IMG_FILTER_CONTRAST, -50);
    
            // Save the preprocessed image back to disk (you can save in the same format it was loaded)
            if ($mimeType == 'image/jpeg') {
                imagejpeg($img, $fullPath);
            } elseif ($mimeType == 'image/png') {
                imagepng($img, $fullPath);
            } elseif ($mimeType == 'image/gif') {
                imagegif($img, $fullPath);
            }
    
            imagedestroy($img); // Free memory
    
            // Initialize Tesseract OCR
            $tesseract = new TesseractOCR($fullPath);
            $tesseract->tessdataDir('C:/Program Files/Tesseract-OCR/tessdata/')
                      ->lang('pol')
                      ->psm(6); // Assume a single block of text (good for receipts)
            $text = $tesseract->run();
    
            // Return the extracted text
            return $text;
        }
    
        return response()->json(['error' => 'No image uploaded.'], 400);
    }
    
}
