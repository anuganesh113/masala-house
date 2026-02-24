<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\Controller;
use App\Traits\FileUpload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * EditorUploadController
 */
class EditorUploadController extends Controller
{
    use FileUpload;

    public function editorUpload(Request $request): JsonResponse
    {
        $file_name = $this->uploadImage($request->file('file'), UploadFilePath::EDITOR_UPLOADS_PATH);

        return response()->json([
            'status' => General::TRUE,
            'message' => Message::EDITOR_MESSAGE['UPLOAD_SUCCESS'],
            'location' => asset(sprintf('%s%s', UploadFilePath::EDITOR_UPLOADS_PATH, $file_name)),
        ]);
    }
}
