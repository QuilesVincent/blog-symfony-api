<?php


namespace App\Infrastructure\Uploader;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface UploaderInterface
{
    public function upload(UploadedFile $file): void;

    public function multipleUpload(array $file): void;
}