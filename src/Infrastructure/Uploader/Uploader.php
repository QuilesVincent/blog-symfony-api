<?php


namespace App\Infrastructure\Uploader;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class Uploader implements UploaderInterface
{

    /**
     * @var string
     */
    private string $uploadsAbsoluteDir = "uploads";


    public function upload(UploadedFile $file): void
    {
        $file->move($this->uploadsAbsoluteDir, $file->getClientOriginalName());
    }

    public function multipleUpload(array $files): void
    {
        foreach($files as $file) {
            $file->move($this->uploadsAbsoluteDir, $file->getClientOriginalName());
        }
    }
}