<?php

namespace App\Repositories;

use App\DTOs\ProfileDTO;
use App\Enums\Status;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $this->profile->image =  $imagePath;
        $this->profile->status = $profileDTO->status;
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
    public function update( ProfileDTO $profileDTO , int $id ) : Profile
    {
        $imagePath = $profileDTO->image->store('images', 'public');
        $this->profile = Profile::query()->findOrFail($id);
        //delete old image
        if ($this->profile->image) {
            Storage::disk('public')->delete($this->profile->image);
        }
        $this->profile->first_name = $profileDTO->firstName;
        $this->profile->last_name = $profileDTO->lastName;
        $this->profile->image = $imagePath;
        $this->profile->status = $profileDTO->status;
        $this->profile->save();
        return $this->profile;
    }

}
