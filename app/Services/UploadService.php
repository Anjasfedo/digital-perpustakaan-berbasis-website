<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    public function handleUploadFile(UploadedFile $file, $directory = 'uploads', $disk = 'public')
    {
        if (is_null($file)) {
            return null;
        }

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $storePath = $file->storeAs($directory, $fileName, $disk);

        return $storePath;
    }

    public function handleDeleteFile($filePath, $disk = 'public')
    {
        if (!empty($filePath)) {
            \Storage::disk($disk)->delete($filePath);
        }
    }

    public function handleUpdateFile(UploadedFile $file, $filePath, $directory = 'uploads', $disk = 'public')
    {
        $this->handleDeleteFile($filePath, $disk);

        $storePath = $this->handleUploadFile($file, $directory, $disk);

        return $storePath;
    }

}