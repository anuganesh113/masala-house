<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTestController extends Controller
{
    public function showForm()
    {
        return '
        <form method="POST" action="/upload-test" enctype="multipart/form-data">
            ' . csrf_field() . '
            <input type="file" name="test_image" required>
            <button type="submit">Upload Test</button>
        </form>
        ';
    }

    public function upload(Request $request)
    {
        $request->validate([
            'test_image' => 'required|image|max:5120' // 5MB max
        ]);

        $results = [];

        // Method 1: Using move() with public_path
        try {
            $file1 = $request->file('test_image');
            $filename1 = 'test1_' . time() . '.' . $file1->getClientOriginalExtension();
            $path1 = public_path('uploads/test');
            
            if (!file_exists($path1)) {
                mkdir($path1, 0755, true);
            }
            
            $file1->move($path1, $filename1);
            $results['method1'] = [
                'success' => true,
                'path' => 'uploads/test/' . $filename1,
                'full_path' => $path1 . '/' . $filename1
            ];
        } catch (\Exception $e) {
            $results['method1'] = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        // Method 2: Using Storage facade with public disk
        try {
            $file2 = $request->file('test_image');
            $filename2 = 'test2_' . time() . '.' . $file2->getClientOriginalExtension();
            $path2 = Storage::disk('public')->putFileAs('test', $file2, $filename2);
            $results['method2'] = [
                'success' => true,
                'path' => $path2,
                'url' => Storage::disk('public')->url($path2)
            ];
        } catch (\Exception $e) {
            $results['method2'] = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        // Method 3: Using store() method
        try {
            $file3 = $request->file('test_image');
            $path3 = $file3->store('test', 'public');
            $results['method3'] = [
                'success' => true,
                'path' => $path3,
                'url' => Storage::disk('public')->url($path3)
            ];
        } catch (\Exception $e) {
            $results['method3'] = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json([
            'message' => 'Upload test complete',
            'results' => $results
        ]);
    }
}
