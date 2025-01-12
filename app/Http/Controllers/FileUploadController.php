<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName);

            // Return JSON response for CKEditor
            $url = Storage::url($filePath);
            return response()->json([
                'url' => $url
            ]);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
}
