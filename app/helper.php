<?php

use Illuminate\Support\Facades\Storage;

/**
 * image upload
 *
 * @param object $file
 * @param string $path
 * @return string
 */
function uploadImage(?object $file, string $path): string
{
    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads/' . $path . '/'), $fileName);

    return "uploads/$path/" . $fileName;
}

/**
 * image delete
 *
 * @param string $image
 * @return void
 */
function deleteImage(?string $image)
{
    $imageExists = file_exists($image);

    if ($imageExists) {
        if ($imageExists != 'backend/image/default.png') {
            @unlink($image);
        }
    }
}
