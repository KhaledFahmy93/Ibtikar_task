<?php

namespace App\Utils\Files;

use Illuminate\Support\Facades\Storage;

trait Uploader
{
    /**
     * Uploads a file
     *
     * @param string $requestFieldName file name request
     * @param string $path path to upload to
     * @return string uploaded file's path
     */
    private function uploadAs($requestFieldName, $path)
    {
        $file = request()->file($requestFieldName);
       
        if(! $file) return false;
        $image =  $this->generateUniqueName() . '.' . $file->getClientOriginalExtension();
      
        request($requestFieldName)->move(public_path('storage/'. $path), $image);

        return $path. '/' .$image;

    }

    /**
     * Delete a file from the specified storage
     *
     * @param string $filePath relative path to the file to delete
     * @param string $storage
     * @return void
     */
    public static function delete($filePath, $storage = 'public')
    {
        if (Storage::disk($storage)->exists($filePath)) {
            Storage::disk($storage)->delete($filePath);
        }
    } 
    
    
    private function generateUniqueName()
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);
    }
}