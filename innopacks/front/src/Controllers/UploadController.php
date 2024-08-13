<?php
 
namespace InnoShop\Front\Controllers;

use Illuminate\Http\JsonResponse;
use InnoShop\Front\Requests\UploadFileRequest;
use InnoShop\Front\Requests\UploadImageRequest;

class UploadController
{
    /**
     * Upload images.
     *
     * @param  UploadImageRequest  $request
     * @return JsonResponse
     */
    public function images(UploadImageRequest $request): JsonResponse
    {
        $image    = $request->file('image');
        $type     = $request->file('type', 'common');
        $filePath = $image->store("/{$type}", 'public');
        $realPath = "storage/$filePath";

        $data = [
            'url'   => asset($realPath),
            'value' => $realPath,
        ];

        return json_success('Upload Successfully', $data);
    }

    /**
     * Upload document files
     *
     * @param  UploadFileRequest  $request
     * @return JsonResponse
     */
    public function files(UploadFileRequest $request): JsonResponse
    {
        $file     = $request->file('file');
        $type     = $request->file('type', 'files');
        $filePath = $file->store("/{$type}", 'public');
        $realPath = "storage/$filePath";

        $data = [
            'url'   => asset($realPath),
            'value' => $realPath,
        ];

        return json_success('Upload Successfully', $data);
    }
}
