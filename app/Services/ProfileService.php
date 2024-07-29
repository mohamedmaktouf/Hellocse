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

    /**
     * @return mixed
     */
    public function list() : mixed
    {
        return $this->profileRepository->list();
    }
    public function update( ProfileDTO $profileDTO , int $id) : Profile
    {
        return $this->profileRepository->update($profileDTO, $id);
    }

}
