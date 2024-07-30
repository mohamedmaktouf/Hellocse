<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ProfileDTO
{

    public string $firstName;
    public string $lastName;
    public UploadedFile $image;
    public int $status;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param UploadedFile $image
     * @param int $status
     */
    public function __construct(string $firstName, string $lastName, UploadedFile $image , int $status){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->image = $image;
        $this->status = $status;
    }
}
