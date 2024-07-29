<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ProfileDTO
{

    public string $firstName;
    public string $lastName;
    public UploadedFile $image;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param UploadedFile $image
     */
    public function __construct(string $firstName, string $lastName, UploadedFile $image){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->image = $image;
    }
}
