<?php

namespace App\Services;

class UserService
{
    public static function handleUploadImage($uploadImage)
    {
        // $uploadImage->getClientOriginalName();
        // dd($uploadImage->getClientOriginalName());
        $path = $uploadImage->store('public/profile', 'local');
        return 'storage/' . substr($path, strlen('public/'));
    }
}
