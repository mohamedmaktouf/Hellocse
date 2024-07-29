<?php

namespace App\Services;

use App\DTOs\ProfileDTO;
use App\Models\Profile;
use App\Repositories\ProfileRepository;

class ProfileService
{
    private ProfileRepository $profileRepository;
    public function __construct(ProfileRepository $profileRepository){
        $this->profileRepository = $profileRepository;
    }
    public function store(ProfileDTO $profileDTO) : Profile
    {
        return $this->profileRepository->store($profileDTO);
    }

}
