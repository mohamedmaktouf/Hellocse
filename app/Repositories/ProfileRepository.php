<?php

namespace App\Repositories;

use App\DTOs\ProfileDTO;
use App\Enums\Status;
use App\Models\Profile;
use App\Models\User;

class ProfileRepository
{
    private Profile $profile;

    /**
     * @param Profile $profile
     */
    public function __construct(Profile $profile){
        $this->profile = $profile;
    }

    /**
     * @param ProfileDTO $profileDTO
     * @return Profile
     */
    public function store(ProfileDTO $profileDTO) : Profile
    {
        $imagePath = $profileDTO->image->store('images', 'public');
        $this->profile->first_name = $profileDTO->firstName;
        $this->profile->last_name = $profileDTO->lastName;
        $this->profile->image = (string) $imagePath;
        $this->profile->status = Status::ACTIVE;
        $this->profile->save();
        return $this->profile;

    }

    /**
     * @return mixed
     */
    public function list() : mixed
    {
        return Profile::active()->get();
    }

}
